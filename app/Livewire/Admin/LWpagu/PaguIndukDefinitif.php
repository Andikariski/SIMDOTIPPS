<?php

namespace App\Livewire\Admin\LWpagu;

use App\Livewire\Admin\SuperAdminAuth as AdminSuperAdminAuth;
use App\Models\PaguInduk as ModelPaguInduk;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;


class PaguIndukDefinitif extends AdminSuperAdminAuth
{
    public $filterTahun = '';
    public $isEdit = false;
    public $existingFotoProfile = null;
    public $paguId = null;

      // Variabel Model Wire Dari Inputan
    public $paguBG;
    public $paguSG;
    public $paguDTI;
    public $tahunPagu;

    // Modal state
    public $showModal = false;
    public $showDetailModal = false;
    public $modalTitle = '';
    
    protected function rules()
    {
        $rules = [
            'tahunPagu' => 'required|numeric',
            'paguBG'    => 'required|numeric',
            'paguSG'    => 'required|numeric',
            'paguDTI'   => 'required|numeric',
        ];
        return $rules;
    }

    public function openTambahModal()
    {
        $this->resetForm();
        $this->isEdit = false;
        $this->modalTitle = 'Input Pagu Induk Definitif';
        $this->showModal = true;
    }

      public function resetForm()
    {
        $this->paguBG = '';
        $this->paguSG = '';
        $this->paguDTI = '';
        $this->isEdit = false;
        $this->resetErrorBag();
    }

     public function closeModal()
    {
        $this->showModal = false;
        $this->showDetailModal = false;
        $this->resetForm();
    }

    public function openEditModal($paguId)
    {
        $paguInduk = ModelPaguInduk::find($paguId);

        if ($paguInduk) {
            $this->paguId = $paguInduk->id;
            $this->paguSG = $paguInduk->pagu_SG;
            $this->paguBG = $paguInduk->pagu_BG;
            $this->paguDTI = $paguInduk->pagu_DTI;
            $this->tahunPagu = $paguInduk->tahun_pagu;
            $this->modalTitle = 'Edit Data Pagu Induk';
            $this->showModal = true;
            $this->isEdit = true; // ← penting!
        }
    }

     #[On('delete-data-paguInduk')]
    public function hapus($id)
    {
        try {
            $paguInduk = ModelPaguInduk::find($id);
                $paguInduk->delete();
                $this->dispatch('success-delete-data',message:  "Pagu {$paguInduk->tahun_pagu} berhasil dihapus.");
                $this->closeModal();
            
        } catch (\Exception $e) {
            $this->dispatch('failed-delete-data',message: 'Gagal Menghapus Data Pagu');
        }
    }

    public function simpan()
    {
        $this->validate();
           if ($this->isEdit) {
                // Update data
                $pagu = ModelPaguInduk::find($this->paguId);
                $pagu->update([
                    // 'fkid_opd'      => $this->idOpd,
                    'pagu_SG'       => $this->paguSG,
                    'pagu_BG'       => $this->paguBG ,
                    'pagu_DTI'      => $this->paguDTI,
                    // 'tahun_pagu'    =>  $this->tahunPagu = date('Y')
                    'tahun_pagu'    =>  $this->tahunPagu
                ]);
                $this->dispatch('success-add-data',message: "Pagu Definitif {$this->tahunPagu} berhasil diubah.");
            } else {
                // Tambah data baru
                ModelPaguInduk::create([
                    'pagu_SG'       => $this->paguSG,
                    'pagu_BG'       => $this->paguBG ,
                    'pagu_DTI'      => $this->paguDTI,
                    // 'tahun_pagu'    =>  $this->tahunPagu = date('Y')
                    'tahun_pagu'    =>  $this->tahunPagu 
                ]);
                $this->dispatch('success-add-data',message: "Pagu Definitif {$this->tahunPagu} berhasil ditambahkan.");
            }
            $this->closeModal();
    }

    #[Layout('components.layouts.admin',['pageTitle' => 'Data Pagu Induk'])]
    public function render()
    {
          $paguInduks = ModelPaguInduk::query()
                    ->where('tahun_pagu', 'like', "%{$this->filterTahun}%")
                    ->latest()
                    ->paginate(5);

          $tahuns = ModelPaguInduk::select('tahun_pagu')
            ->distinct()
            ->orderBy('tahun_pagu', 'desc')
            ->pluck('tahun_pagu');

        return view('livewire.admin.LW_pagu.pagu-induk-definitif',compact('paguInduks','tahuns'));
    }
}
