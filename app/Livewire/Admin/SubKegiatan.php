<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;

class SubKegiatan extends Component
{
     #[Layout('components.layouts.admin',['pageTitle' => 'Sub Kegiatan'])]
    public function render()
    {
        return view('livewire.admin.sub-kegiatan');
    }
}
