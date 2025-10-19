<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

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
        return view('livewire.admin.dashboard');
    }
}
