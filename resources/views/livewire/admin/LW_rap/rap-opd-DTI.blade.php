<div>
     @php
        $breadcrumbs = [
            ['name' => 'Data RAP', 'url' => route('opd.rap.rapDTI')],
            // ['name' => 'Artikel', 'url' => route('admin.posts.index')],
        ];
    @endphp
    <x-breadcrumb :items="$breadcrumbs" />
<div>
 <div class="card text-white shadow-sm border-0" style="background: linear-gradient(135deg, #219EBC 0%,  #4f46e5 100%);">
        <div class="row">
            <div class="col-3">
                <div class="card-body">
                    <h5 class="card-title">Dana DTI</h5>
                        @if($getPaguOPD && $getTahunAktif)
                            <h3 class="fw-bold">
                                {{ number_format($getPaguOPD->pagu_DTI, 0, ',', '.') }}
                            </h3>
                            <p class="mb-0">Tahun Anggaran Aktif : <span class="badge bg-success">{{ $getPaguOPD->tahun_pagu }}</span></p>
                        @else
                            <span class="badge bg-danger">Belum ada pagu aktif / Pagu belum dibagi</span>
                        @endif
                </div>
            </div>
            <div class="col-3">
                <div class="card-body">
                    <h5 class="card-title">Dana Terpakai BG</h5>
                    <h3 class="fw-bold">135.000.000.000</h3>
                    <p class="mb-0">Tahun Anggaran 2025</p>
                </div>
            </div>
            <div class="col-3">
                <div class="card-body">
                    <h5 class="card-title">Dana SiLPA</h5>
                    <h3 class="fw-bold">20.000.000.000</h3>
                    <p class="mb-0">Tahun Anggaran 2025</p>
                </div>
            </div>
            <div class="col-3">
            <div class="card-body">
                <h5 class="card-title">Akses & Status RAP</h5>
                {{-- Kode Notifikasi Status Akses RAP --}}
                    @if ($statusAkses === 'Buka')
                        <div class="d-flex align-items-center mb-1">
                            <span class="badge bg-success me-1">
                                <i class="bi bi-unlock-fill fs-5 text-white"></i>
                            </span>
                            <h6 class="fw-bold mb-0">Terbuka</h6>
                        </div>
                        {{-- <p class="mb-0 text-muted">Akses RAP Terbuka</p> --}}
                    @elseif($statusAkses === 'Tutup')
                        <div class="d-flex align-items-center mb-1">
                            <span class="badge bg-danger me-1">
                                <i class="bi bi-lock-fill fs-5 text-white"></i>
                            </span>
                            <h6 class="fw-bold mb-0">Terkunci</h6>
                        </div>
                        {{-- <p class="mb-0 text-muted">Akses RAP Tertutup</p> --}}
                    @endif

                    {{-- Kode Notifikasi Status RAP --}}
                    <div class="d-flex align-items-center">
                        <span class="badge bg-danger me-1">
                            <i class="bi bi-repeat-1 fs-5 text-white"></i>
                        </span>
                        @if ($statusRAP === 'RAP Awal')
                            <h6 class="fw-bold mb-0">RAP Awal</h6>
                        @elseif($statusRAP === 'Perubahan II')
                            <h6 class="fw-bold mb-0">Perubahan II</h6>
                        @elseif($statusRAP === 'Perubahan III')
                            <h6 class="fw-bold mb-0">Perubahan III</h6>
                        @endif
                    </div>
            </div>
            </div>
        </div>
    </div>
    {{-- <div class="card text-white shadow-sm border-0" style="background: linear-gradient(135deg, #219EBC 0%,  #4f46e5 100%);">
        <div class="row">
            <div class="col-3">
                <div class="card-body">
                    <h5 class="card-title">Dana Otsus BG</h5>
                    <h3 class="fw-bold">120.000.000.000</h3>
                    <p class="mb-0">Tahun Anggaran 2025</p>
                </div>
            </div>
            <div class="col-3">
                <div class="card-body">
                    <h5 class="card-title">Dana Otsus SG</h5>
                    <h3 class="fw-bold">135.000.000.000</h3>
                    <p class="mb-0">Tahun Anggaran 2025</p>
                </div>
            </div>
            <div class="col-3">
                <div class="card-body">
                    <h5 class="card-title">Dana DTI</h5>
                    <h3 class="fw-bold">190.000.000.000</h3>
                    <p class="mb-0">Tahun Anggaran 2025</p>
                </div>
            </div>
            <div class="col-3">
                <div class="card-body">
                    <h5 class="card-title">Dana SiLPA</h5>
                    <h3 class="fw-bold">20.000.000.000</h3>
                    <p class="mb-0">Tahun Anggaran 2025</p>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- @if ($status === 'Buka')
        <div class="alert alert-success  alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-diamond" style="font-size: 20px; color:rgb(0, 185, 46)"></i>
            <strong> TERBUKA, </strong> Akses perubahan RAP sudah terbuka, silakan lakukan perubahan.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif($status === 'Tutup')    
        <div class="alert alert-danger  alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-diamond" style="font-size: 20px; color:rgb(208, 0, 0)"></i>
            <strong> TERKUNCI, </strong> Akses perubahan RAP masih terkunci, anda tidak dapat melakukan perubahan.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif --}}
    <div class="mt-5">
       <div class="row align-items-center mb-3 mt-4">
            <div class="col-md-4">
                <input type="text" placeholder="Search..." wire:model.live="search" class="form-control rounded-1">
            </div>
            <div class="col-md-2">
                <select class="form-control" wire:model.live="filterTahun">
                        <option   option value="">--Pilih Tahun--</option>
                    {{-- @foreach ($tahuns as $tahun)
                        <option value="{{ $tahun }}">Tahun {{ $tahun }}</option>
                    @endforeach --}}
            </select>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                @if($statusRAP === 'Buka')
                    <a href="{{ route('opd.rap.create',['type' => 'rap-opd-dti']) }}" class="btn btn-primary" wire:navigate>
                        <i class="bi bi-journal-plus"></i> Input RAP
                    </a>
                @else
                    <a class="btn btn-outline-primary disabled-link">
                        <i class="bi bi-journal-plus"></i> Input RAP
                    </a>
                @endif
            </div>
        </div>
        <div class="rounded-1 overflow-hidden border p-0 table-responsive" >
            <table class="table table-striped align-middle mb-0">
                <thead class="table-secondary">
                    <tr>
                        <th class="px-4 py-2 text-dark">No</th>
                        <th class="px-4 py-2 text-dark">Kode Klasifikasi</th>
                        <th class="px-4 py-2 text-dark">Sub Kegiatan</th>
                        <th class="px-4 py-2 text-dark">Pagu</th>
                        <th class="px-4 py-2 text-dark">Sumber Dana</th>
                        <th class="px-4 py-2 text-dark">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($raps as $rap)
                    <tr>
                        <td class="px-4 py-1 text-dark">{{ $loop->iteration }}</td>
                        <td class="px-4 py-1 text-dark">{{ $rap->kode_klasifikasi }}</td>
                        <td class="px-4 py-1 text-dark">{{ Str::limit(strip_tags($rap->sub_kegiatan), 30)  }}</td>
                        <td class="px-4 py-1 text-dark">{{ number_format($rap->pagu_tahun_berjalan) }}</td>
                        <td class="px-4 py-1 text-dark">{{ $rap->sumber_dana }}</td>
                          <td class="px-4 py-1 d-flex gap-2">
                               @if($statusAkses === 'Buka')
                                <button wire:click="openEditModal({{ $rap->id }})"
                                    class="btn btn-sm btn-outline-dark d-flex align-items-center gap-1">
                                    <i class="bi bi-pencil"></i>
                                </button>

                                <button wire:click="openDetailModal({{ $rap->id }})"
                                    class="btn btn-sm btn-outline-primary d-flex align-items-center gap-1">
                                    <i class="bi bi-eye"></i>
                                </button>

                                <button wire:click="$dispatch('confirm-delete-data-RAPBG', {{ $rap }})"
                                    class="btn btn-sm btn-outline-danger d-flex align-items-center gap-1">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            @else
                                <span class="badge bg-danger m-1">Akses Terkunci</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-5 text-center">
                            <div class="d-inline-flex flex-column align-items-center justify-content-center">
                                <i class="bi bi-emoji-tear text-warning" style="font-size: 60px"></i>
                                <span class="fs-5 text-dark">RAP Belum diInput!</span>
                            </div>
                        </td>
                    </tr>   
                @endforelse
            </tbody>
            </table>
            {{-- <select id="kegiatan" class="form-control select2" wire:model="idOpd">
                <option value="">-- Pilih Sub Kegiatan --</option>
                   @foreach ($pilihSub as $kegiatan)
                       <option value="{{ $kegiatan->id }}">{{ $kegiatan->sub_kegiatan }}</option>
                   @endforeach
            </select> --}}
        </div>    
    </div>   
     <div class="mt-4">
        {{ $raps->links('vendor.livewire.bootstrap-pagination') }}
    </div>
</div>

{{-- @if ($this->showModal)
        <x-modal :title="$modalTitle" :closeble="true" @click.self="$wire.closeModal()"
            @keydown.escape.window="$wire.closeModal()">
            <x-slot name="closeButton">
                <button type="button" class="btn-close" aria-label="Close" wire:click="closeModal">
                </button>
            </x-slot>
            <hr>
            <form wire:submit.prevent="simpan">
                <div class="mb-3">
                    <label class="form-label"><strong>Instansi OPD</strong></label> 
                        @if ($modalTitle == 'Edit Data Pagu OPD')
                            <input type="text" wire:model="idOpd" class="form-control" disabled>
                        @else
                        <select id="opd" class="form-control select2" wire:model="idOpd">
                                <option value="">-- Pilih Instansi --</option>
                                    @foreach ($opds as $opd)
                                        <option value="{{ $opd->id }}">{{ $opd->nama_opd }}</option>
                                    @endforeach
                        </select>
                        @error('opd')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    @endif
                </div>
                <div class="mb-3">
                    <label for="paguBG" class="form-label">
                        <strong>Pagu Block Grand (BG 1%)</strong>
                    </label>
                    <input type="number" class="form-control @error('paguBG') is-invalid @enderror" id="pagu_bg"
                        wire:model="paguBG" placeholder="Masukkan Pagu BG..." maxlength="255">
                    @error('paguBG')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="paguSG" class="form-label">
                        <strong>Pagu Spesifik Grand (1,25%)</strong>
                    </label>
                    <input type="number" class="form-control @error('paguSG') is-invalid @enderror" id="pagu_sg"
                        wire:model="paguSG" placeholder="Masukkan Pagu SG..." maxlength="255">
                    @error('paguSG')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="paguDTI" class="form-label">
                        <strong>Pagu Dana Tambahan Infrastruktur (DTI)</strong>
                    </label>
                    <input type="number" class="form-control @error('paguDTI') is-invalid @enderror" id="pagu_dti"
                        wire:model="paguDTI" placeholder="Masukkan Pagu DTI..." maxlength="255">
                    @error('paguDTI')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                

            </form>
            <x-slot name="footer">
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-danger" wire:click="closeModal">
                        <span wire:loading.remove wire:target="closeModal">Batal</span>
                        <span wire:loading wire:target="closeModal">tunggu...</span>
                    </button>
                    <button type="button" class="btn btn-primary" wire:click="simpan" wire:loading.attr="disabled">
                        <span wire:loading.remove wire:target="simpan">
                            {{ $isEdit ? 'Perbarui' : 'Simpan' }}
                        </span>
                        <span wire:loading wire:target="simpan">
                            <span class="spinner-border spinner-border-sm me-2"></span>
                            Menyimpan...
                        </span>
                    </button>
                </div>
            </x-slot>
        </x-modal>
    @endif --}}

    {{-- @if ($this->showDetailModal)
        <x-modal :title="$modalTitle" :closeble="true" @click.self="$wire.closeModal()"
            @keydown.escape.window="$wire.closeModal()">

            <x-slot name="closeButton">
                <button type="button" class="btn-close" aria-label="Close" wire:click="closeModal">
                </button>
            </x-slot>

            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="mb-3">
                        <small>Nama OPD</small>
                        <p class="fs-6 fw-bold">{{ $namaOpd }}</p>
                    </div>
                    <div class="mb-3">
                        <small>Pagu Block Grand (1%)</small>
                        <p class="fs-6 fw-bold">{{ $kodeOpd }}</p>
                    </div>
                    <div class="mb-3">
                        <small>Pagu Spesifik Grand (1,25%)</small>
                        <p class="fs-6 fw-bold">{{ $kodeOpd }}</p>
                    </div>
                    <div class="mb-3">
                        <small>Pagu DTI (1%)</small>
                        <p class="fs-6 fw-bold">{{ $kodeOpd }}</p>
                    </div>
                    <div class="mb-3">
                        <small>Tahun Pagu</small>
                        <p class="fs-6 fw-bold">{{ $alamatOpd }}</p>
                    </div>
                </div>
            </div>

            <x-slot name="footer">
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-danger" wire:click="closeModal">
                        <span wire:loading.remove wire:target="closeModal">Tutup</span>
                        <span wire:loading wire:target="closeModal">tunggu...</span>
                    </button>
                </div>
            </x-slot>
        </x-modal>
    @endif --}}
</div>

