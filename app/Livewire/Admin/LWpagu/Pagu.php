<?php

namespace App\Livewire\Admin\LWpagu;
use Livewire\Attributes\Layout;

use Livewire\Component;

class Pagu extends Component
{
     #[Layout('components.layouts.admin',['pageTitle' => 'Data Pagu'])]
    public function render()
    {
        return view('livewire.admin.LW_pagu.pagu');
    }
}
