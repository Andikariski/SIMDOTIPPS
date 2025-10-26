<?php

namespace App\Livewire\Admin;

use App\Models\Pagu as ModelsPagu;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{

    public $data;

    public function mount()
    {
        // $this->data = ['total_anggaran' => 12000000];
        // dd($this->data); // 🔍 tampil sekali di browser waktu halaman dibuka
    }


    #[Layout('components.layouts.admin',['pageTitle' => 'Dashboard'])]
    public function render()
    {
        $userOpdId = Auth::user();
        $paguOPD = 0;
        
        if ($userOpdId->is_admin == 0 && $userOpdId->opd_id) {
            // Ambil nilai total pagu dari OPD user yang login
            $paguOPD = ModelsPagu::where('fkid_opd', $userOpdId->opd_id)
            ->where('tahun_pagu',date('Y'))->first();
        }

        // $paguOPD = ModelsPagu::where('fkid_opd', $userOpdId)->first();
        
        // dd($userOpdId->opd_id);
        // dd($paguOPD);
        return view('livewire.admin.dashboard',['paguOPD'=>$paguOPD]);

        // Masih ada erro di nilai pagu, jika admin login error karena admin tidak punya pagu tambahkan logika nanti
    }
}
