<?php

namespace App\Livewire\Admin\LWrap;

use Livewire\Component;
use Livewire\Attributes\Layout;

class CreateRap extends Component
{
    #[Layout('components.layouts.admin',['pageTitle' => 'Data Rencana Anggaran Program'])]
    public function render()
    {
        return view('livewire.admin.LW_rap.rap-create');
    }
}
