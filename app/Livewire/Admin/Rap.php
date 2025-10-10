<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;

class Rap extends Component
{
     #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.rap');
    }
}
