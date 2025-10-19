<?php

namespace App\Livewire\Admin\LWrap;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Livewire\Admin\SuperAdminAuth as AdminSuperAdminAuth;

class Rap extends AdminSuperAdminAuth
{
    public function render()
    {
        return view('livewire.admin.LW_rap.rap');
    }
}
