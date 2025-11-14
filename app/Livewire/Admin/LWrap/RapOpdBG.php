<?php

namespace App\Livewire\Admin\LWrap;

use App\Models\Kontrol as ModelKontrol;
use App\Models\Pagu as ModelPaguOPD;
use App\Models\PaguInduk as ModelPaguInduk;
use App\Models\Rap as ModelsRAP;
use App\Models\SubKegiatan;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class RapOpdBG extends Component
{
    public $statusRAP;
    public $statusAkses;
    public $search = '';

    public function mount()
    {
        $this->loadStatus();
    }

    public function loadStatus()
    {
        $kontrol = ModelKontrol::firstOrCreate(
            ['tipe' => 'RAP_Akses'],
            ['status' => 'Tutup']
        );
        $this->statusAkses = $kontrol->status;

        $kontrol = ModelKontrol::firstOrCreate(
            ['tipe' => 'RAP_Status'],
            ['status' => 'RAP Awal']
        );
        $this->statusRAP = $kontrol->status;
    }

    public function redirectToCreate()
    {
        if ($this->status === 'Tutup') {
            // Kirim notifikasi ke browser
            $this->dispatch('success-add-data',message: "Akses belum dibuka.");
        } else {
            // Redirect ke halaman input RAP
            return redirect()->route('rap.create');
        }
    }

     #[On('delete-data-RAPBG')]
    public function hapus($id)
    {
        try {
            $rap = ModelsRAP::find($id);
                $rap->delete();
                $this->dispatch('success-delete-data',message:  "Berhasil, Sub Kegiatan berhasil dihapus.");
                // $this->closeModal();
                return;
            
        } catch (\Exception $e) {
            $this->dispatch('failed-delete-data',message: 'Gagal, Sub kegiatan tidak terhapus');
        }
    }

     #[Layout('components.layouts.admin',['pageTitle' => 'Data RAP Block Grand 1%'])]
    public function render()
    {
    $opd = Auth::user()->opd_id;

    //  Ambil daftar RAP
   $raps = ModelsRAP::where('fkid_opd', $opd)
        ->where('sumber_dana', 'Otsus 1%')
        ->when($this->search, function ($query) {
            $query->where(function ($q) {
                $q->where('kode_klasifikasi', 'like', "%{$this->search}%")
                ->orWhere('sub_kegiatan', 'like', "%{$this->search}%");
            });
        })
        ->latest()
        ->paginate(10);

    // Ambil tahun pagu aktif (bisa null)
    $getTahunAktif = ModelPaguInduk::where('status', 'Aktif')->first();

    // Cek apakah data aktif ada
    $getPaguOPD = null;
    if ($getTahunAktif) {
        $getPaguOPD = ModelPaguOPD::where('tahun_pagu', $getTahunAktif->tahun_pagu)
                                ->where('fkid_opd', $opd)
                                ->first();
    }

    return view('livewire.admin.LW_rap.rap-opd-BG', compact('raps', 'getPaguOPD', 'getTahunAktif'));
    }

}
