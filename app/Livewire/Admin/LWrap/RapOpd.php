<?php

namespace App\Livewire\Admin\LWrap;

use App\Models\Kontrol as ModelKontrol;
use App\Models\SubKegiatan;
use Livewire\Component;
use Livewire\Attributes\Layout;

class RapOpd extends Component
{
    public $status;

    public function mount()
    {
        $this->loadStatus();
    }

    public function loadStatus()
    {
        $kontrol = ModelKontrol::firstOrCreate(
            ['nama' => 'RAP'],
            ['status' => 'Tutup']
        );
        $this->status = $kontrol->status;
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

     #[Layout('components.layouts.admin',['pageTitle' => 'Data Rencana Anggaran Program'])]
    public function render()
    {
        return view('livewire.admin.LW_rap.rap-opd');
    }
}
