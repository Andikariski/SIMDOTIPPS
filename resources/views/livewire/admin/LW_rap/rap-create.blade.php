<div>
     @php
        $breadcrumbs = [
            ['name' => 'Data RAP', 'url' => route('rap.index')],
            ['name' => 'Input RAP', 'url' => route('rap.create')],
            // ['name' => 'Artikel', 'url' => route('admin.posts.index')],
        ];
    @endphp
    <x-breadcrumb :items="$breadcrumbs" />
<div>

    <div class="mt-5">
        {{-- <div class="rounded-1 overflow-hidden border p-0 table-responsive" > --}}
            <form wire:submit.prevent="simpan">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label"><strong>Sub Kegiatan</strong></label> 
                        <select wire:ignore id="selectSubKegiatan" class="form-control" data-url="{{ url('api/get-sub-kegiatan') }}">
                            <option value="">-- Cari Sub Kegiatan --</option>
                            {{-- @foreach ($subKegiatans as $kegiatan)
                                <option value="{{ $kegiatan->id }}">{{ $kegiatan->sub_kegiatan }}</option>
                            @endforeach --}}
                        </select>
                        <input type="hidden" class="form-control" readonly wire:model="sub_kegiatan">
                        <input type="hidden" class="form-control" readonly wire:model="aktivitas_utama">
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label class="form-label"><strong>Kewenangan</strong></label> 
                                <input type="text" class="form-control" readonly wire:model="kewenangan" disabled>
                            </div>
                            <div class="col">
                                <label class="form-label"><strong>Kode Klasifikasi</strong></label> 
                                <input type="text" class="form-control" readonly wire:model="kode_klasifikasi" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Klasifikasi Belanja</strong></label> 
                        <input type="text" class="form-control" readonly wire:model="klasifikasi_belanja" disabled>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><strong>Jenis Kegiatan</strong><span style="color: red;">*</span></label> 
                            <select class="form-control select2 tes" wire:model="jenis_kegiatan">
                                <option value="">-- Pilih Jenis Kegiatan --</option>
                                <option value="fiskik">Kegiatan Fisik</option>
                                <option value="nonfiskik">Kegiatan Non-Fisik</option>
                            </select>
                            @error('jenis_kegiatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Volume Tahun Berjalan</strong><span style="color: red;">*</span></label> 
                        <input type="number" class="form-control" wire:model="volume_tahun_berjalan">
                        @error('volume_tahun_berjalan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Volume SiLPA Melanjutkan Kegiatan</strong></label> 
                        <input type="number" class="form-control"  wire:model="volume_silpa_melanjutkan">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Volume SiLPA Efisiensi Tahun Lalu</strong></label> 
                        <input type="number" class="form-control"  wire:model="volume_silpa_efisiensi">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Satuan</strong></label> 
                        <input type="text" class="form-control" disabled wire:model="satuan">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Indikator</strong></label> 
                        <input type="text" class="form-control" disabled wire:model="indikator">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Output Kinerja</strong></label> 
                        <input type="text" class="form-control" disabled wire:model="kinerja">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Pagu Tahun Berjalan</strong><span style="color: red;">*</span></label> 
                        <input type="number" class="form-control"  wire:model="pagu_tahun_berjalan">
                         @error('pagu_tahun_berjalan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Pagu Melanjutkan Kegiatan</strong></label> 
                        <input type="number" class="form-control"  wire:model="pagu_silpa_melanjutkan">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Pagu Efisiensi Tahun Lalu</strong></label> 
                        <input type="number" class="form-control"  wire:model="pagu_silpa_efisiensi">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Sumber Dana</strong><span style="color: red;">*</span></label> 
                            <select id="subKegiatan" class="form-control select2" wire:model="sumber_dana">
                                <option value="">-- Pilih Sumber Dana --</option>                                 
                                <option value="Otsus 1%">Otsus 1% (BG)</option>
                                <option value="Otsus 1,25%">Otsus 1,25% (SG)</option>
                                <option value="Dti">Dana Tambahan Infrastruktur (DTI)</option>
                            </select>
                            @error('sumber_dana')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                    <label class="" style="color: red;"><span >*</span> <i>Menandakan kolom wajib untuk id isi</i></label>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label"><strong>Aktivitas Utama</strong></label> 
                            <select wire:ignore id="selectActivitasUtama" class="form-control" data-url="{{ url('api/get-aktivitas-utama') }}">
                                <option value="">-- Cari Aktivitas Utama --</option>
                                    {{-- @foreach ($aktivitas as $aktv)
                                        <option value="{{ $aktv->id }}">{{ $aktv->aktivitas_utama }}</option>
                                    @endforeach --}}
                            </select>
                            {{-- @error('subKegaitan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror --}}
                    </div>
                     <div class="mb-3">
                        <label class="form-label"><strong>Tema Pembangunan</strong></label> 
                        <input type="text" class="form-control" disabled wire:model="tema_pembangunan">
                    </div>
                     <div class="mb-3">
                        <label class="form-label"><strong>Program Prioritas</strong></label> 
                        <input type="text" class="form-control" disabled wire:model="program_prioritas">
                    </div>
                     <div class="mb-3">
                        <label class="form-label"><strong>Target Keluaran Strategis</strong></label> 
                        <input type="text" class="form-control" disabled wire:model="target_keluaran_strategis">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Lokus</strong><span style="color: red;">*</span></label> 
                        <input type="text" class="form-control"  wire:model="lokasi">
                         @error('lokasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Titik Lokus</strong><span style="color: red;">*</span></label> 
                        <input type="text" class="form-control"  wire:model="titik_lokasi">
                         @error('titik_lokasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Sasaran Penerima</strong><span style="color: red;">*</span></label> 
                            <select id="subKegiatan" class="form-control select2" wire:model="sasaran">
                                <option value="">-- Pilih Sasaran Penerima --</option>                                 
                                <option value="Oap">Orang Asli Papua (OAP)</option>
                                <option value="Umum">Masyarakat Umum</option>
                            </select>
                            @error('sasaran')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>PPSB</strong><span style="color: red;">*</span></label> 
                            <select id="subKegiatan" class="form-control select2" wire:model="ppsb">
                                <option value="">-- Pilih PPSB --</option>                                 
                                <option value="ya">Ya</option>
                                <option value="tidak">Tidak</option>
                            </select>
                            @error('ppsb')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Penerima Manfaat</strong><span style="color: red;">*</span></label> 
                            <select id="subKegiatan" class="form-control select2" wire:model="penerima_manfaat">
                                <option value="">-- Pilih Penerima Manfaat --</option>                                 
                                <option value="Sub Kegaitan Pendukung">Sub Kegiatan Pendukung</option>
                                <option value="Terikat Langsung Ke Penerima Manfaat">Terikat Langsung Ke Penerima Manfaat</option>
                            </select>
                            @error('penerima_manfaat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Sinergi Dana Lain</strong><span style="color: red;">*</span></label> 
                            <select id="subKegiatan" class="form-control select2" wire:model="sinergi_dana_lain">
                                <option value="">-- Pilih Sinergi Dana Lain --</option>
                                <option value="Tidak Ada">Tidak Ada</option>
                                <option value="Otsus 1%">Otsus 1% (BG)</option>
                                <option value="Otsus 1,25%">Otsus 1,25% (SG)</option>
                                <option value="Dti">Dana Tambahan Infrastruktur (DTI)</option>
                            </select>
                            @error('sinergi_dana_lain')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Multiyears</strong><span style="color: red;">*</span></label> 
                            <select id="subKegiatan" class="form-control select2" wire:model="multiyears">
                                <option value="">-- Pilih Multiyears --</option>                                 
                                <option value="ya">Ya</option>
                                <option value="tidak">Tidak</option>
                            </select>
                            @error('multiyears')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label class="form-label"><strong>Jadwal Mulai</strong><span style="color: red;">*</span></label> 
                                <input type="date" class="form-control" wire:model="jadwal_awal">
                                @error('jadwal_awal')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="form-label"><strong>Jadwal Selesai</strong><span style="color: red;">*</span></label> 
                                <input type="date" class="form-control" wire:model="jadwal_akhir">
                                @error('jadwal_akhir')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Deskripsi Keterangan</strong></label> 
                        <textarea class="form-control" style="min-height: 127px; resize: none;" wire:model="keterangan"></textarea>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-end mt-3">
                <div class="col-auto"> 
                    <button type="button" class="btn btn-danger" > Reset Form</button>
                    <button type="button" class="btn btn-primary"  wire:click="simpan" wire:loading.attr="disabled">
                        <span wire:loading.remove wire:target="simpan">
                            Simpan
                        </span>
                        <span wire:loading wire:target="simpan">
                            <span class="spinner-border spinner-border-sm me-2"></span>
                            Menyimpan...
                        </span>
                    </button>
                </div>
            </div>
        </form>
        {{-- </div>     --}}
    </div>   
     <div class="mt-4">
        {{-- {{ $pagus->links('vendor.livewire.bootstrap-pagination') }} --}}
    </div>
</div>
</div>


