<?php

namespace App\Livewire\Admin\LWpagu;

use App\Livewire\Admin\SuperAdminAuth as AdminSuperAdminAuth;
use App\Models\Opd as ModelsOpd;
use App\Models\Pagu as ModelsPaguOPD;
use App\Models\PaguInduk as ModelPaguInduk;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;

use Livewire\Component;

class PaguOPD extends AdminSuperAdminAuth
{
    use WithPagination;

    public $search = '';
    public $filterTahun = '';

    public $isEdit = false;
    public $existingFotoProfile = null;
    public $paguId = null;

    // Variabel Model Wire Dari Inputan
    public $namaOpd;
    public $idOpd;
    public $paguBG;
    public $paguSG;
    public $paguDTI;
    public $tahunPagu;
    public $kodeOpd;
    public $tahun_anggaran;
    public $tahunAktif;

    // Modal state
    public $showModal = false;
    public $showDetailModal = false;
    public $modalTitle = '';

    public $sisaSG;
    public $sisaBG;
    public $sisaDTI;


    protected $rules = [
        'idOpd'      => 'required',
        // 'tahunPagu'  => 'required|numeric|min:2000|max:2100',
        'paguBG'     => 'required|numeric|min:0',
        'paguSG'     => 'required|numeric|min:0',
        'paguDTI'    => 'required|numeric|min:0',
    ];

     protected $messages = [
        'idOpd.required'     => 'Silakan pilih Instansi OPD terlebih dahulu.',
        'paguBG.required'    => 'Pagu Block Grant (BG 1%) wajib diisi / Isi 0 jika tidak ada alokasi.',
        'paguBG.numeric'     => 'Pagu Block Grant (BG 1%) harus berupa angka.',
        'paguSG.required'    => 'Pagu Spesifik Grand (1,25%) wajib diisi / Isi 0 jika tidak ada alokasi.',
        'paguSG.numeric'     => 'Pagu Spesifik Grand (1,25%) harus berupa angka.',
        'paguDTI.required'   => 'Pagu Dana Tambahan Infrastruktur (DTI) wajib diisi / Isi 0 jika tidak ada alokasi',
        'paguDTI.numeric'    => 'Pagu Dana Tambahan Infrastruktur (DTI) harus berupa angka.',
    ];

     public function openTambahModal()
    {   
        $getTahunAktif = ModelPaguInduk::where('status','Aktif')->first();

         if (!$getTahunAktif) {
            $this->dispatch('failed-add-data', message: 'Tidak ada Pagu Induk yang aktif!');
            return;
        }

        $this->tahunAktif = $getTahunAktif->tahun_pagu;
          // 🔹 Hitung total dana yang sudah dibagi ke OPD
            $totalPaguOPD = ModelsPaguOPD::selectRaw('
                SUM(pagu_SG) as total_sg,
                SUM(pagu_BG) as total_bg,
                SUM(pagu_DTI) as total_dti
            ')
            ->where('tahun_pagu', $this->tahunAktif)
            ->first();
            // 🔹 Hitung sisa masing-masing jenis pagu
            $this->sisaSG  = $getTahunAktif->pagu_SG  - ($totalPaguOPD->total_sg ?? 0);
            $this->sisaBG  = $getTahunAktif->pagu_BG  - ($totalPaguOPD->total_bg ?? 0);
            $this->sisaDTI = $getTahunAktif->pagu_DTI - ($totalPaguOPD->total_dti ?? 0);

        $this->resetForm();
        $this->isEdit = false;
        $this->modalTitle = 'Input Pagu OPD';
        $this->showModal = true;
    }

     public function resetForm()
    {
        $this->paguBG = '';
        $this->paguSG = '';
        $this->paguDTI = '';
        $this->idOpd = '';
        $this->tahunPagu = '';
        $this->isEdit = false;
        $this->resetErrorBag();
    }

     public function closeModal()
    {
        $this->showModal = false;
        $this->showDetailModal = false;
        $this->resetForm();
    }

    public function openEditModal($paguId)
    {
        $paguOpd = ModelsPaguOPD::find($paguId);
        $getTahunAktif = ModelPaguInduk::where('status','Aktif')->first();
         if (!$getTahunAktif) {
            $this->dispatch('failed-add-data', message: 'Tidak ada Pagu Induk yang aktif!');
            return;
        }

        $this->tahunAktif = $getTahunAktif->tahun_pagu;
          // 🔹 Hitung total dana yang sudah dibagi ke OPD
            $totalPaguOPD = ModelsPaguOPD::selectRaw('
                SUM(pagu_SG) as total_sg,
                SUM(pagu_BG) as total_bg,
                SUM(pagu_DTI) as total_dti
            ')
            ->where('tahun_pagu', $this->tahunAktif)
            ->first();
            // 🔹 Hitung sisa masing-masing jenis pagu
            $this->sisaSG  = $getTahunAktif->pagu_SG  - ($totalPaguOPD->total_sg ?? 0);
            $this->sisaBG  = $getTahunAktif->pagu_BG  - ($totalPaguOPD->total_bg ?? 0);
            $this->sisaDTI = $getTahunAktif->pagu_DTI - ($totalPaguOPD->total_dti ?? 0);

        if ($paguOpd) {
            
            $this->paguId = $paguOpd->id;
            $this->idOpd = $paguOpd->fkid_opd;
            $this->namaOpd = $paguOpd->opd->nama_opd;
            $this->paguSG = $paguOpd->pagu_SG;
            $this->paguBG = $paguOpd->pagu_BG;
            $this->paguDTI = $paguOpd->pagu_DTI;
            // $this->tahunPagu = $getTahunAktif->tahun_pagu;
            $this->tahunAktif = $getTahunAktif->tahun_pagu;
            $this->modalTitle = 'Edit Data Pagu OPD';
            $this->showModal = true;
            $this->isEdit = true; // ← penting!
        }
    }

     public function openDetailModal($paguId)
    {
        $paguOpd = ModelsPaguOPD::find($paguId);

        if ($paguOpd) {
            $this->paguId = $paguOpd->id;
            $this->kodeOpd = $paguOpd->opd->kode_opd;
            $this->namaOpd = $paguOpd->opd->nama_opd;
            $this->paguSG = $paguOpd->pagu_SG;
            $this->paguBG = $paguOpd->pagu_BG;
            $this->paguDTI = $paguOpd->pagu_DTI;
            $this->tahunPagu = $paguOpd->tahun_pagu;
            $this->modalTitle = 'Detail Data Pagu OPD';
            $this->showDetailModal = true;
        }
    }

    
    // public function simpan()
    // {
    //     // dd($this->all());
    //     $this->validate();
    //     $cekDataPagu = ModelsPagu::where('fkid_opd',$this->idOpd)
    //                                 ->where('tahun_pagu',$this->tahunPagu)->first();
    //     // dd($cekDataPagu);


    //     $opd = ModelsOpd::find($this->idOpd);
    //        if ($this->isEdit) {
    //             // Update data
    //             $pagu = ModelsPagu::find($this->paguId);
    //             $pagu->update([
    //                 // 'fkid_opd'      => $this->idOpd,
    //                 'pagu_SG'       => $this->paguSG,
    //                 'pagu_BG'       => $this->paguBG ,
    //                 'pagu_DTI'      => $this->paguDTI,
    //                 'tahun_pagu'    =>  $this->tahunPagu
    //             ]);
    //             $this->dispatch('success-add-data',message: "Berhasil, Pagu {$opd->kode_opd} telah diperbarui.");
    //             $this->closeModal();
    //         } else {
    //             if(!$cekDataPagu){
    //                     // Tambah data baru
    //                 ModelsPagu::create([
    //                     'fkid_opd'      => $this->idOpd,
    //                     'pagu_SG'       => $this->paguSG,
    //                     'pagu_BG'       => $this->paguBG ,
    //                     'pagu_DTI'      => $this->paguDTI,
    //                     'tahun_pagu'    =>  $this->tahunPagu
    //                 ]);
    //                 $this->dispatch('success-add-data',message: "Berhasil, Pagu {$opd->kode_opd} telah ditetapkan.");
    //                 $this->closeModal();
    //             }
    //             else{
    //                  $this->dispatch('failed-add-data', message: "Gagal, Pagu {$opd->kode_opd} tahun {$this->tahunPagu} Sudah ditetapkan.");
    //             }
              
    //         }
            
    // }

    public function simpan()
    {
        // dd($this->all());
        $this->validate();

        // 1️⃣ Cek apakah Pagu Induk tahun ini ada
        $paguInduk = ModelPaguInduk::where('tahun_pagu', $this->tahunAktif)->first();
        

        // dd($paguInduk);
        if (!$paguInduk) {
            $this->dispatch('failed-add-data', message: "Gagal! Pagu Induk tahun {$this->tahunAktif} belum ditetapkan.");
            return;
        }

        // 2️⃣ Ambil total pagu OPD yang sudah ada (kecuali kalau sedang edit)
        $query = ModelsPaguOPD::where('tahun_pagu', $this->tahunAktif);
        if ($this->isEdit) {
            $query->where('id', '!=', $this->paguId);
        }

        $totalSG  = $query->sum('pagu_SG');
        $totalBG  = $query->sum('pagu_BG');
        $totalDTI = $query->sum('pagu_DTI');

        // 3️⃣ Tambahkan nilai input sekarang ke total yang sudah ada
        $totalBaruSG  = $totalSG  + $this->paguSG;
        $totalBaruBG  = $totalBG  + $this->paguBG;
        $totalBaruDTI = $totalDTI + $this->paguDTI;

        // 4️⃣ Validasi apakah melebihi pagu induk
        if (
            $totalBaruSG  > $paguInduk->pagu_SG ||
            $totalBaruBG  > $paguInduk->pagu_BG ||
            $totalBaruDTI > $paguInduk->pagu_DTI
        ) {
            $this->dispatch('failed-add-data', message: "Gagal! Total pembagian OPD melebihi Pagu Induk tahun {$this->tahunAktif}.");
            
            return;
        }

        // 5️⃣ Cek apakah OPD sudah punya pagu untuk tahun ini (khusus tambah baru)
        $cekDataPagu = ModelsPaguOPD::where('fkid_opd', $this->idOpd)
            ->where('tahun_pagu', $this->tahunAktif)
            ->first();

        $opd = ModelsOpd::find($this->idOpd);

        // 6️⃣ Jika edit → update data lama
        if ($this->isEdit) {
            $pagu =ModelsPaguOPD::find($this->paguId);
            $pagu->update([
                'pagu_SG'     => $this->paguSG,
                'pagu_BG'     => $this->paguBG,
                'pagu_DTI'    => $this->paguDTI,
                'tahun_pagu'  => $this->tahunAktif,
            ]);
            $this->dispatch('success-add-data', message: "Berhasil! Pagu {$opd->kode_opd} tahun {$this->tahunAktif} telah diperbarui.");
            $this->closeModal();
            return;
        }

        // 7️⃣ Jika tambah baru → pastikan belum ada
        if ($cekDataPagu) {
            $this->dispatch('failed-add-data', message: "Gagal! Pagu {$opd->kode_opd} tahun {$this->tahunAktif} sudah ditetapkan.");
            return;
        }

        // 8️⃣ Simpan data baru
        ModelsPaguOPD::create([
            'fkid_opd'     => $this->idOpd,
            'pagu_SG'      => $this->paguSG,
            'pagu_BG'      => $this->paguBG,
            'pagu_DTI'     => $this->paguDTI,
            'tahun_pagu'   => $this->tahunAktif,
        ]);

        $this->dispatch('success-add-data', message: "Berhasil! Pagu {$opd->kode_opd} tahun {$this->tahunAktif} telah ditetapkan.");
        $this->closeModal();
}


     #[On('delete-data-paguOPD')]
    public function hapus($id)
    {
        try {
            $pagu = ModelsPaguOPD::find($id);
                $pagu->delete();
                $this->dispatch('success-delete-data',message:  "Pagu {$pagu->opd->kode_opd} berhasil dihapus.");
                return;
            
        } catch (\Exception $e) {
            $this->dispatch('failed-delete-data',message: 'Gagal Menghapus Data Pagu');
        }
    }

    #[Layout('components.layouts.admin',['pageTitle' => 'Data Pagu OPD'])]
    public function render()
    {
    // Ambil data tahun aktif dari tabel Pagu Induk
    $getTahunAktif = ModelPaguInduk::where('status', 'Aktif')->first();

    // Ambil data Pagu OPD hanya untuk tahun yang aktif
    $paguOpds = ModelsPaguOPD::with('opd')
        ->when($getTahunAktif, function ($query) use ($getTahunAktif) {
            $query->where('tahun_pagu', $getTahunAktif->tahun_pagu);
        })
        ->when($this->search, function ($query) {
            $query->whereHas('opd', function ($sub) {
                $sub->where('nama_opd', 'like', "%{$this->search}%");
            });
        })
        ->latest()
        ->paginate(10);

        // Ambil daftar tahun
        $tahuns = ModelsPaguOPD::select('tahun_pagu')
            ->distinct()
            ->orderBy('tahun_pagu', 'desc')
            ->pluck('tahun_pagu');

        // Jika ada tahun aktif, ambil data OPD yang belum punya pagu di tahun itu
        $opds = collect(); // default kosong biar aman
        $paguInduk = null; // default null
        $existingOpdIds = collect();

        if ($getTahunAktif) {
            $existingOpdIds = ModelsPaguOPD::where('tahun_pagu', $getTahunAktif->tahun_pagu)->pluck('fkid_opd');
            $opds = ModelsOpd::whereNotIn('id', $existingOpdIds)
                ->orderBy('nama_opd')
                ->get();
            $paguInduk = ModelPaguInduk::where('tahun_pagu', $getTahunAktif->tahun_pagu)->first();
        }

    return view('livewire.admin.LW_pagu.pagu-opd', compact(
        'paguOpds', 'tahuns', 'opds', 'paguInduk', 'getTahunAktif'
    ));
}

}
