<div>
     @php
        $breadcrumbs = [
            ['name' => 'Daftar Sub Kegiatan OPD', 'url' => route('superadmin.opd')],
            // ['name' => 'Artikel', 'url' => route('admin.posts.index')],
        ];
    @endphp
    <x-breadcrumb :items="$breadcrumbs" />
    <div class="">
       <div class="d-flex justify-content-between align-items-center mb-3 mt-4">
            <!-- Kiri -->
            <input type="text" placeholder="Cari kode atau nama kegiatan.." wire:model.live="search" class="form-control w-25 rounded-1">
            <!-- Kanan -->
            <div class="d-flex gap-2">
                <button type="button" class="btn btn-danger" wire:click="kosongkanTabel">
                    <i class="bi bi-trash"></i> Kosongkan Database
                </button>
                <button type="button" class="btn btn-success" wire:click="openImportModal">
                    <i class="bi bi-upload"></i> Import Data
                </button>
                <button type="button" class="btn btn-primary" wire:click="openTambahModal">
                    <i class="bi bi-plus-lg"></i> Tambah Sub Kegiatan
                </button>
            </div>
        </div>

        <div  iv class="rounded-1 overflow-hidden border p-0">
        <table class="table table-striped align-middle mb-0">
            <thead class="table-secondary">
                <tr>
                    <th class="px-4 py-2 text-dark">No</th>
                    <th class="px-4 py-2 text-dark">Kewenangan</th>
                    <th class="px-4 py-2 text-dark">Kode Klasifiakasi</th>
                    <th class="px-4 py-2 text-dark">Sub Kegiatan</th>
                    <th class="px-4 py-2 text-dark">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($subKegiatans as $subKegiatan) 
                     <tr>
                        <td class="px-4 py-1 text-dark">{{ $loop->iteration }}</td> <!-- Nomor urut -->
                        <td class="px-4 py-1 text-dark">{{ $subKegiatan->kewenangan}}</td>
                        <td class="px-4 py-1 text-dark">{{ $subKegiatan->kode_klasifikasi }}</td>
                        <td class="px-4 py-1 text-dark">{{ Str::limit(strip_tags($subKegiatan->sub_kegiatan),50) }}</td>

                         <td class="px-4 py-1 d-flex gap-2">
                                <!-- Tombol Edit -->
                                <button wire:click="openEditModal({{ $subKegiatan->id }})"
                                    class="btn btn-sm btn-outline-dark d-flex align-items-center gap-1">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <!-- Tombol Edit -->
                                <button wire:click="openDetailModal({{ $subKegiatan->id }})"
                                    class="btn btn-sm btn-outline-primary d-flex align-items-center gap-1">
                                    <i class="bi bi-eye"></i>
                                </button>

                                <!-- Tombol Hapus -->
                                <button wire:click="$dispatch('confirm-delete-data-subKegiatan', {{ $subKegiatan }})"
                                    class="btn btn-sm btn-outline-danger d-flex align-items-center gap-1">
                                    <i class="bi bi-trash3"></i>
                                </button>
                        </td>
                    </tr> 
                 @empty 
                    <tr>
                        <td colspan="5" class="px-4 py-5 text-center">
                            <div class="d-inline-flex flex-column align-items-center justify-content-center">
                                <i class="bi bi-emoji-tear text-warning" style="font-size: 60px"></i>
                                <span class="fs-5 text-dark">Sub kegiatan masih kosong!</span>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $subKegiatans->links('vendor.livewire.bootstrap-pagination') }}
    </div>
</div>

@if ($this->showModal)
        <x-modal :title="$modalTitle" :closeble="true" @click.self="$wire.closeModal()"
            @keydown.escape.window="$wire.closeModal()" >

            <x-slot name="closeButton">
                <button type="button" class="btn-close" aria-label="Close" wire:click="closeModal">
                </button>
            </x-slot>

            <form wire:submit.prevent="simpan">
                <div class="row">
                    <div class="col-6">
                    <div class="mb-3">
                        <label for="opd" class="form-label">Kewenangan</label>
                            <select id="opd" class="form-control" wire:model="kewenangan">
                                    <option selected>-- Pilih Kewenangan --</option>                         
                                    <option value="Prov">Provinsi</option>
                                    <option value="Kab">Kabupaten</option>
                            </select>
                            @error('kewenangan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nip" class="form-label">
                            Kode Klasifikasi
                        </label>
                        <input type="text" class="form-control @error('kodeKlasifikasi') is-invalid @enderror" id="nama_opd"
                            wire:model="kodeKlasifikasi" placeholder="Masukkan kode klasfikasi..." maxlength="255">
                        @error('kodeKlasifikasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nip" class="form-label">
                            Sub Kegaitan
                        </label>
                        <input type="text" class="form-control @error('subKegiatan') is-invalid @enderror" id="kode_opd"
                            wire:model="subKegiatan" placeholder="Masukkan sub kegiatan..." maxlength="255">
                        @error('subKegiatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nip" class="form-label">
                            Kinerja
                        </label>
                        <input type="text" class="form-control @error('kinerja') is-invalid @enderror" id="kode_opd"
                            wire:model="kinerja" placeholder="Masukkan sub kegiatan..." maxlength="255">
                        @error('kinerja')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="nip" class="form-label">
                            Indikator
                        </label>
                        <input type="text" class="form-control @error('indikator') is-invalid @enderror" id="kode_opd"
                            wire:model="indikator" placeholder="Masukkan sub kegiatan..." maxlength="255">
                        @error('indikator')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nip" class="form-label">
                            Indikator
                        </label>
                        <input type="text" class="form-control @error('satuan') is-invalid @enderror" id="kode_opd"
                            wire:model="satuan" placeholder="Masukkan sub kegiatan..." maxlength="255">
                        @error('satuan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nip" class="form-label">
                            Klasifikasi Belanja
                        </label>
                        <input type="text" class="form-control @error('klasifikasiBelanja') is-invalid @enderror" id="kode_opd"
                            wire:model="klasifikasiBelanja" placeholder="Masukkan sub kegiatan..." maxlength="255">
                        @error('klasifikasiBelanja')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    </div>
                </div>
            </form>
            <x-slot name="footer">
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-danger" wire:click="closeModal">
                        <span wire:loading.remove wire:target="closeModal">Batal</span>
                        <span wire:loading wire:target="closeModal">Tunggu...</span>
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
    @endif

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
                        <small>Kode OPD</small>
                        <p class="fs-6 fw-bold">{{ $kodeOpd }}</p>
                    </div>
                    <div class="mb-3">
                        <small>Alamat OPD</small>
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

    @if ($this->showImportModal)
    <x-modal title="Import Data Sub Kegiatan" :closeble="true" @click.self="$wire.closeImportModal()"
        @keydown.escape.window="$wire.closeImportModal()">

        {{-- Tombol X di pojok kanan --}}
        <x-slot name="closeButton">
            <button type="button" class="btn-close" aria-label="Close" wire:click="closeImportModal"></button>
        </x-slot>

        {{-- Body modal --}}
        <div class="row">
            <div class="col-12">
                <form wire:submit.prevent="import" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="file" class="form-label fw-semibold">Pilih File Excel</label>
                        <input type="file" id="file" wire:model="file" class="form-control">
                        <small class="text-muted d-block mt-1">Format: .xlsx, .xls, atau .csv (maks 10 MB)</small>
                        @error('file')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Preview upload --}}
                    @if ($file)
                        <div class="alert alert-info py-2">
                            <i class="bi bi-file-earmark-spreadsheet me-1"></i>
                            <strong>{{ $file->getClientOriginalName() }}</strong> siap diupload.
                        </div>
                    @endif
                </form>
            </div>
        </div>

        {{-- Footer modal --}}
        <x-slot name="footer">
            <div class="d-flex gap-2 w-100 justify-content-end">
                <button type="button" class="btn btn-danger" wire:click="closeModal">
                    <span wire:loading.remove wire:target="closeModal">Batal</span>
                    <span wire:loading wire:target="closeModal">Menutup...</span>
                </button>

                <button type="submit" class="btn btn-primary" wire:click="import" wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="import">
                        <i class="bi bi-upload"></i> Upload
                    </span>
                    <span wire:loading wire:target="import">
                        <span class="spinner-border spinner-border-sm me-2"></span> Mengunggah...
                    </span>
                </button>
            </div>
        </x-slot>
    </x-modal>
@endif

</div>

