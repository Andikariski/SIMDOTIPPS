<?php

namespace App\Livewire\Admin;

use App\Livewire\Admin\SuperAdminAuth as AdminSuperAdminAuth;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Exception;
use Livewire\Attributes\On;
use App\Models\Opd as ModelsOpd;
use Livewire\WithPagination;


class Opd extends AdminSuperAdminAuth
{
    use WithPagination;
    public $search = '';

    public $nama_opd;
    public $kode_opd;
    public $alamat_opd;


    public $isEdit = false;
    public $existingFotoProfile = null;
    public $opdId = null;

    // Modal state
    public $showModal = false;
    public $showDetailModal = false;
    public $modalTitle = '';

    protected function rules()
    {
        $rules = [
            'nama_opd'      => 'required|string',
            'kode_opd'      => 'required|string',
            'alamat_opd'    => 'required|string',
        ];


        return $rules;
    }

    public function openTambahModal()
    {
        // return 10;
        $this->resetForm();
        $this->isEdit = false;
        $this->modalTitle = 'Tambah OPD Baru';
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->showDetailModal = false;
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->nama_opd = '';
        $this->kode_opd = '';
        $this->alamat_opd = '';
        $this->opdId = null;
        $this->isEdit = false;
        $this->resetErrorBag();
    }

    public function simpan()
    {
        $this->validate();

           if ($this->isEdit) {
                // Update data
                $opd = ModelsOpd::find($this->opdId);
                $opd->update([
                    'nama_opd' => $this->nama_opd,
                    'kode_opd' => $this->kode_opd,
                    'alamat_opd' => $this->alamat_opd,
                ]);

                $this->dispatch('success-edit-data');
            } else {
                // Tambah data baru
                ModelsOpd::create([
                   'nama_opd' => $this->nama_opd,
                    'kode_opd' => $this->kode_opd,
                    'alamat_opd' => $this->alamat_opd,
                ]);

                $this->dispatch('success-add-data',message: 'Berhasil Menambah Data OPD');
                
            }

            $this->closeModal();
    }



    #[Layout('components.layouts.admin',['pageTitle' => 'OPD'])]
    public function render()
    {
        $opd = ModelsOpd::query()
        // ->with('')
        ->where('nama_opd', 'like', "%{$this->search}%")
        ->latest()
        ->paginate(10);
        return view('livewire.admin.opd',['opds'=>$opd]);
    }

    #[On('delete-data-opd')]
    public function hapus($id)
    {
        try {
            $opd = ModelsOpd::find($id);
                $opd->delete();
                $this->dispatch('success-delete-data',message: 'Berhasil Menghapus Data OPD');
                $this->closeModal();
            
        } catch (\Exception $e) {
            $this->dispatch('failed-delete-data',message: 'Gagal Menghapus Data OPD');
        }
    }
}
