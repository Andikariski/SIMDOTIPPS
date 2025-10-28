<?php

namespace App\Livewire\Admin\LWrap;

use App\Models\Kontrol as ModelKontrol;
use App\Models\SubKegiatan;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;

use App\Livewire\Admin\SuperAdminAuth as AdminSuperAdminAuth;


class Rap extends Component
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

    public function toggleStatus()
    {
        $kontrol = ModelKontrol::where('nama', 'RAP')->first();
        if ($kontrol) {
            $kontrol->status = $kontrol->status === 'Buka' ? 'Tutup' : 'Buka';
            $kontrol->save();
            $this->status = $kontrol->status; // langsung update tampilan
        }
        // Refresh otomatis komponen agar tampilan ikut berubah
        $this->dispatch('succes-change',message: "Status Rap Telah di {$this->status}");
        // $this->dispatch('statusUpdated', $this->status);
    }

     #[Layout('components.layouts.admin',['pageTitle' => 'Data Rencana Anggaran Program'])]
    public function render()
    {
        $pilihSub = SubKegiatan::all();
        return view('livewire.admin.LW_rap.rap',compact('pilihSub'));
    }
}
