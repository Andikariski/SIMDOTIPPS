<?php

namespace App\Livewire\Admin\LWpagu;

use App\Livewire\Admin\SuperAdminAuth as AdminSuperAdminAuth;
use App\Models\Opd as ModelsOpd;
use App\Models\Pagu as ModelsPagu;
use App\Models\PaguInduk as ModelPaguInduk;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;

use Livewire\Component;

class Pagu extends AdminSuperAdminAuth
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

    // Modal state
    public $showModal = false;
    public $showDetailModal = false;
    public $modalTitle = '';

     protected function rules()
    {
        $rules = [
            'idOpd'   => 'required',
            'paguBG'  => 'required|numeric',
            'paguSG'  => 'required|numeric',
            'paguDTI' => 'required|numeric',
        ];
        return $rules;
    }

     public function openTambahModal()
    {
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
        $paguOpd = ModelsPagu::find($paguId);

        if ($paguOpd) {
            
            $this->paguId = $paguOpd->id;
            $this->idOpd = $paguOpd->fkid_opd;
            $this->namaOpd = $paguOpd->opd->nama_opd;
            $this->paguSG = $paguOpd->pagu_SG;
            $this->paguBG = $paguOpd->pagu_BG;
            $this->paguDTI = $paguOpd->pagu_DTI;
            $this->tahunPagu = $paguOpd->tahun_pagu;
            $this->modalTitle = 'Edit Data Pagu OPD';
            $this->showModal = true;
            $this->isEdit = true; // ← penting!
        }
    }

     public function openDetailModal($paguId)
    {
        $paguOpd = ModelsPagu::find($paguId);

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

    
     public function simpan()
    {
        $this->validate();
        $opd = ModelsOpd::find($this->idOpd);
           if ($this->isEdit) {
                // Update data
                $pagu = ModelsPagu::find($this->paguId);
                $pagu->update([
                    // 'fkid_opd'      => $this->idOpd,
                    'pagu_SG'       => $this->paguSG,
                    'pagu_BG'       => $this->paguBG ,
                    'pagu_DTI'      => $this->paguDTI,
                    'tahun_pagu'    =>  $this->tahunPagu = date('Y')
                ]);
                $this->dispatch('success-add-data',message: "Pagu {$opd->kode_opd} berhasil diperbarui.");
            } else {
                // Tambah data baru
                ModelsPagu::create([
                    'fkid_opd'      => $this->idOpd,
                    'pagu_SG'       => $this->paguSG,
                    'pagu_BG'       => $this->paguBG ,
                    'pagu_DTI'      => $this->paguDTI,
                    'tahun_pagu'    =>  $this->tahunPagu = date('Y')
                ]);
                $this->dispatch('success-add-data',message: "Pagu {$opd->kode_opd} berhasil ditambahkan.");
            }
            $this->closeModal();
    }

     #[On('delete-data-paguOPD')]
    public function hapus($id)
    {
        try {
            $pagu = ModelsPagu::find($id);
                $pagu->delete();
                $this->dispatch('success-delete-data',message:  "Pagu {$pagu->opd->kode_opd} berhasil dihapus.");
                $this->closeModal();
            
        } catch (\Exception $e) {
            $this->dispatch('failed-delete-data',message: 'Gagal Menghapus Data Pagu');
        }
    }

    #[Layout('components.layouts.admin',['pageTitle' => 'Data Pagu OPD'])]
    public function render()
    {
        $pagus = ModelsPagu::with('opd')->when($this->search, function ($query) {
                $query->whereHas('opd', function ($q) 
                { $q->where('nama_opd', 'like', "%{$this->search}%");
            })
                ->orWhere('tahun_pagu', 'like', "%{$this->search}%");
            })
            // Filter tahun hanya jika dipilih
                ->when(!empty($this->filterTahun), function ($query) {
                $query->where('tahun_pagu', $this->filterTahun);
            })
            ->latest()
            ->paginate(7);

        $tahuns = ModelsPagu::select('tahun_pagu')
            ->distinct()
            ->orderBy('tahun_pagu', 'desc')
            ->pluck('tahun_pagu');

        $opds = ModelsOpd::all();

        $paguInduk = ModelPaguInduk::where('tahun_pagu',date('Y'))->first();

        // $pagus = ModelsPagu::all();
        return view('livewire.admin.LW_pagu.pagu',compact('pagus','tahuns','opds','paguInduk'));
        
    }
}
