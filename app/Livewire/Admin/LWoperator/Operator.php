<?php

namespace App\Livewire\Admin\LWoperator;
use App\Livewire\Admin\SuperAdminAuth as AdminSuperAdminAuth;
use App\Models\User as ModelUser;
use Livewire\Component;
use Livewire\Attributes\Layout;

class Operator extends Component
{   public $search = '';
    public $operator;
    
    // Isi tabel
    public $name;
    public $email;
    public $kontak;

     #[Layout('components.layouts.admin',['pageTitle' => 'Operator'])]
    public function render()
    {
        $operator = ModelUser::query()
        // ->with('')
        ->where('name', 'like', "%{$this->search}%")
        ->latest()
        ->paginate(7);
        return view('livewire.admin.LW_operator.operator',['operators'=>$operator]);
    }
}
