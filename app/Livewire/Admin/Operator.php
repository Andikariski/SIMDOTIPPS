<?php

namespace App\Livewire\Admin;
use App\Livewire\Admin\SuperAdminAuth as AdminSuperAdminAuth;
use Livewire\Component;
use Livewire\Attributes\Layout;


// class di ekstend ke SuperAdminAuth agar bisa di cek admin atau bukan
class Operator extends SuperAdminAuth
{
     #[Layout('components.layouts.admin',['pageTitle' => 'Operator'])]
    public function render()
    {
        return view('livewire.admin.operator');
    }
}
