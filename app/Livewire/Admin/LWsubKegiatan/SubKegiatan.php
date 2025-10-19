<?php

namespace App\Livewire\Admin\LWsubKegiatan;

use Livewire\Component;
use Livewire\Attributes\Layout;

class SubKegiatan extends Component
{
     #[Layout('components.layouts.admin',['pageTitle' => 'Sub Kegiatan'])]
    public function render()
    {
        return view('livewire.admin.LW_subKegiatan.sub-kegiatan');
    }
}
