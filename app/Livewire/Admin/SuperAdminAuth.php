<?php

namespace App\Livewire\Admin;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class SuperAdminAuth extends Component
{
    public function mount()
    {
         if (!Auth::check() || Auth::user()->is_admin != 1) {
             abort(404);
        }
    }
}
