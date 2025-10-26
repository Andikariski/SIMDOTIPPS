<?php

namespace App\Livewire\Admin\LWsubKegiatan;

use Livewire\Component;
use Livewire\Attributes\Layout;

class SubKegiatan extends Component
{
    public $filterTahun = '';
    public $isEdit = false;
    public $existingFotoProfile = null;
    public $subKegiatanId = null;


      // Variabel Model Wire Dari Inputan
    public $fkidOpd;
    public $kodeKlasifikasi;
    public $subKegiatan;

    // Modal state
    public $showModal = false;
    public $showDetailModal = false;
    public $modalTitle = '';

    public function openTambahModal()
    {
        $this->resetForm();
        $this->isEdit = false;
        $this->modalTitle = 'Input Sub Kegiatan';
        $this->showModal = true;
    }

    public function resetForm()
    {
        $this->kodeKlasifikasi = '';
        $this->subKegiatan = '';
        $this->isEdit = false;
        $this->resetErrorBag();
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->showDetailModal = false;
        $this->resetForm();
    }

     #[Layout('components.layouts.admin',['pageTitle' => 'Sub Kegiatan'])]
    public function render()
    {
        return view('livewire.admin.LW_subKegiatan.sub-kegiatan');
    }
}
