<?php

namespace App\Livewire\Admin\LWrap;

use App\Models\Kontrol as ModelKontrol;
use App\Models\SubKegiatan;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

use App\Livewire\Admin\SuperAdminAuth as AdminSuperAdminAuth;


class RapSuperAdmin extends AdminSuperAdminAuth
{
    public $status;

    public function mount()
    {
        if (!Auth::check() || Auth::user()->is_admin != 1) {
             abort(404);
        }
        $this->loadStatus();
    }

    public function loadStatus()
    {
        $kontrol = ModelKontrol::firstOrCreate(
            ['tipe' => 'RAP_Akses'],
            ['status' => 'Tutup']
        );
        $this->status = $kontrol->status;
    }

    public function toggleStatusAksesRAP()
    {
        $kontrol = ModelKontrol::where('tipe', 'RAP_Akses')->first();
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
        return view('livewire.admin.LW_rap.rap-super-admin',compact('pilihSub'));
    }
}
