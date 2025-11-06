<?php

namespace App\Livewire\Admin\LWrap;

use App\Models\AktivitasUtama as ModelsAktivitas;
use App\Models\Kontrol as ModelsKontrol;
use App\Models\Rap as ModelsRap;
use App\Models\SubKegiatan as ModelSubKegiatan;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class CreateRap extends Component
{
    // Sub Kegiatan Initialisasi
    public $id_sub_kegiatan;
    public $kode_klasifikasi;
    public $klasifikasi_belanja;
    public $satuan;
    public $indikator;
    public $kinerja;
    public $fkid_opd;
    public $kewenangan;
    public $sub_kegiatan;

    // Activitas Utama Initialisasi
    public $id_aktivitas_utama;
    public $aktivitas_utama;
    public $tema_pembangunan;
    public $program_prioritas;
    public $target_keluaran_strategis;

    // Auth::user()->opd_id;
    public $jenis_kegiatan;
    public $volume_tahun_berjalan;
    public $volume_silpa_melanjutkan;
    public $volume_silpa_efisiensi;
    public $volume_total;
    public $pagu_tahun_berjalan;
    public $pagu_silpa_melanjutkan;
    public $pagu_silpa_efisiensi;
    public $pagu_total;
    public $sumber_dana;
    public $lokasi;
    public $titik_lokasi;
    public $sasaran;
    public $ppsb;
    public $penerima_manfaat;
    public $sinergi_dana_lain;
    public $multiyears;
    public $jadwal_awal;
    public $jadwal_akhir;
    public $keterangan;


    protected function rules()
    {
        $rules = [
            // 'idOpd'             => 'required',
            // 'id_sub_kegiatan'       => 'required',
            // 'id_aktivitas_utama'    => 'required',
            'jenis_kegiatan'        => 'required',
            'volume_tahun_berjalan' => 'required|integer',
            'pagu_tahun_berjalan'   => 'required|integer',
            'sumber_dana'           => 'required',
            'lokasi'                => 'required',
            'sasaran'               => 'required',
            'ppsb'                  => 'required',
            'penerima_manfaat'      => 'required',
            'sinergi_dana_lain'     => 'required',
            'multiyears'            => 'required',
            'jadwal_awal'           => 'required',
            'jadwal_akhir'          => 'required',
        ];
        return $rules;
    }
    /**
     * Auto-fill field saat sub kegiatan berubah
     */

    public function searchSubKegiatan(Request $request){
        $search = $request->input('q', '');
            $results = ModelSubKegiatan::query()
                ->when($search, fn($q) => $q->where('sub_kegiatan', 'like', "%{$search}%"))
                ->limit(30) // batasi biar ringan
                ->get(['id', 'sub_kegiatan']);
        return response()->json($results);
    }

    public function searchAktivitasUtama(Request $request){
        $search = $request->input('q', '');
            $results = ModelsAktivitas::query()
                ->when($search, fn($q) => $q->where('aktivitas_utama', 'like', "%{$search}%"))
                ->limit(30) // batasi biar ringan
                ->get(['id', 'aktivitas_utama']);
        return response()->json($results);
    }

    
    #[On('subKegiatanChanged')]
    public function onSubKegiatanChanged($id)
    {
        // dd($id);
    if (!$id) {
        $this->resetSubKegiatanFields();
        return;
    }
    $sub = ModelSubKegiatan::find($id);
        if ($sub) {
            $this->id_sub_kegiatan      = $id;
            $this->sub_kegiatan         = $sub->sub_kegiatan;
            $this->kewenangan           = $sub->kewenangan;
            $this->kode_klasifikasi     = $sub->kode_klasifikasi;
            $this->klasifikasi_belanja  = $sub->klasifikasi_belanja;
            $this->satuan               = $sub->satuan;
            $this->indikator            = $sub->indikator;
            $this->kinerja              = $sub->kinerja;
        } else {
            // $this->resetSubKegiatanFields();
        }
    }

    #[On('activitasUtamaChanged')]
    public function onActivitasUtamaChanged($id)
    {
        // dd($id);
    if (!$id) {
        $this->resetAktivitasUtamaFields();
        return;
    }
    $aktivitas = ModelsAktivitas::find($id);
        if ($aktivitas) {
            $this->id_aktivitas_utama       = $id;
            $this->aktivitas_utama          = $aktivitas->aktivitas_utama;
            $this->tema_pembangunan         = $aktivitas->tema_pembangunan;
            $this->program_prioritas        = $aktivitas->program_prioritas;
            $this->target_keluaran_strategis= $aktivitas->target_keluaran_strategis;

        } else {
            // $this->resetSubKegiatanFields();
        }
    }

    public function simpan(){
        // $this->validate();
        try{
            $this->validate();
        }
        catch(ValidationException $e){
            $this->dispatch('failed-add-rap', message: "Gagal, Ada form wajib yang belum terisi");
            throw $e; 
        }
        
        $opd = Auth::user()->opd_id;
        $kontrol = ModelsKontrol::first();
        $cekDataRap = ModelsRap::where('kode_klasifikasi',$this->kode_klasifikasi)->first();
        // dd($cekDataRap);

        if($kontrol->status === 'Buka'){
            if(!$cekDataRap){
                 ModelsRap::create([
                            'kewenangan'                =>$this->kewenangan,
                            'fkid_sub_kegiatan'         =>$this->id_sub_kegiatan,
                            'fkid_aktivitas_utama'      =>$this->id_aktivitas_utama,
                            'fkid_opd'                  => $opd,
                            'jenis_kegiatan'            =>$this->jenis_kegiatan,
                            'volume_tahun_berjalan'     =>$this->volume_tahun_berjalan,
                            'volume_silpa_melanjutkan'  =>$this->volume_silpa_melanjutkan,
                            'volume_silpa_efisiensi'    =>$this->volume_silpa_efisiensi,
                            'volume_total'              =>$this->volume_silpa_efisiensi + $this->volume_silpa_melanjutkan + $this->volume_tahun_berjalan,
                            'satuan_volume'             =>$this->satuan,
                            'pagu_tahun_berjalan'       =>$this->pagu_tahun_berjalan,
                            'pagu_silpa_melanjutkan'    =>$this->pagu_silpa_melanjutkan,
                            'pagu_silpa_efisiensi'      =>$this->pagu_silpa_efisiensi,
                            'pagu_total'                =>$this->pagu_tahun_berjalan + $this->pagu_silpa_melanjutkan + $this->pagu_silpa_efisiensi,
                            'sumber_dana'               =>$this->sumber_dana,
                            'lokasi'                    =>$this->lokasi,
                            'titik_lokasi'              =>$this->titik_lokasi,
                            'sasaran'                   =>$this->sasaran,
                            'ppsb'                      =>$this->ppsb,
                            'penerima_manfaat'          =>$this->penerima_manfaat,
                            'sinergi_dana_lain'         =>$this->sinergi_dana_lain,
                            'multiyears'                =>$this->multiyears,
                            'jadwal_awal'               =>$this->jadwal_awal,
                            'jadwal_akhir'              =>$this->jadwal_akhir,
                            'keterangan'                =>$this->keterangan,
                            'kode_klasifikasi'          =>$this->kode_klasifikasi,
                            'sub_kegiatan'              =>$this->sub_kegiatan,
                            'kinerja'                   =>$this->kinerja,
                            'indikator'                 =>$this->indikator,
                            'satuan'                    =>$this->satuan,
                            'klasifikasi_belanja'       =>$this->klasifikasi_belanja,
                            'aktivitas_utama'           =>$this->aktivitas_utama,
                            'tema_pembangunan'          =>$this->tema_pembangunan,
                            'program_prioritas'         =>$this->program_prioritas,
                            'target_keluaran_strategis' =>$this->target_keluaran_strategis
                        ]);
                        $this->dispatch('success-add-data', message: "RAP Berhasil diInput");
                    }
            else{       
                $this->dispatch('failed-add-rap', message: "Gagal, Sub Kegiatan Sudah ada");
            }
                }
        else{
            $this->dispatch('failed-add-rap', message: "Status RAP Tutup");
        }

    }


    #[Layout('components.layouts.admin', ['pageTitle' => 'Data Rencana Anggaran Program'])]
    public function render()
    {
        $subKegiatans = ModelSubKegiatan::all();
        $aktivitas = ModelsAktivitas::all();

        return view('livewire.admin.LW_rap.rap-create');
    }
}
