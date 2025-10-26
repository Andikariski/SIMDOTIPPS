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
            <input type="text" placeholder="Cari kode atau nama kegiatan.." wire:model.live="search" class="form-control w-25 rounded-1">
            <button type="button" class="btn btn-primary w-20" wire:click="openTambahModal">
                <i class="bi bi-plus-lg"></i> Tambah Sub Kegiatan
            </button>
        </div>
        <div  iv class="rounded-1 overflow-hidden border p-0">
        <table class="table table-striped align-middle mb-0">
            <thead class="table-secondary">
                <tr>
                    <th class="px-4 py-2 text-dark">No</th>
                    <th class="px-4 py-2 text-dark">Kode Klasifikasi</th>
                    <th class="px-4 py-2 text-dark">Sub Kegiatan</th>
                    <th class="px-4 py-2 text-dark">Opd Pengelolah</th>
                    <th class="px-4 py-2 text-dark">Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- @forelse ($opds as $opd) --}}
                    {{-- <tr>
                        <td class="px-4 py-1 text-dark">{{ $loop->iteration }}</td> <!-- Nomor urut -->
                        <td class="px-4 py-1 text-dark">{{ Str::limit(strip_tags($opd->nama_opd), 60) }}</td>
                        <td class="px-4 py-1 text-dark">{{ $opd->kode_opd }}</td>

                         <td class="px-4 py-1 d-flex gap-2">
                                <!-- Tombol Edit -->
                                <button wire:click="openEditModal({{ $opd->id }})"
                                    class="btn btn-sm btn-outline-dark d-flex align-items-center gap-1">
                                </button>
                                <!-- Tombol Edit -->
                                <button wire:click="openDetailModal({{ $opd->id }})"
                                    class="btn btn-sm btn-outline-primary d-flex align-items-center gap-1">
                                    <i class="bi bi-eye"></i>
                                </button>

                                <!-- Tombol Hapus -->
                                <button wire:click="$dispatch('confirm-delete-data-opd', {{ $opd }})"
                                    class="btn btn-sm btn-outline-danger d-flex align-items-center gap-1">
                                    <i class="bi bi-trash3"></i>
                                </button>
                        </td>
                    </tr> --}}
                {{-- @empty --}}
                    <tr>
                        <td colspan="5" class="px-4 py-5 text-center">
                            <div class="d-inline-flex flex-column align-items-center justify-content-center">
                                <i class="bi bi-emoji-tear text-warning" style="font-size: 60px"></i>
                                <span class="fs-5 text-dark">Sub kegiatan masih kosong!</span>
                            </div>
                        </td>
                    </tr>
                {{-- @endforelse --}}
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{-- {{ $opds->links('vendor.livewire.bootstrap-pagination') }} --}}
    </div>
</div>

@if ($this->showModal)
        <x-modal :title="$modalTitle" :closeble="true" @click.self="$wire.closeModal()"
            @keydown.escape.window="$wire.closeModal()">

            <x-slot name="closeButton">
                <button type="button" class="btn-close" aria-label="Close" wire:click="closeModal">
                </button>
            </x-slot>

            <form wire:submit.prevent="simpan">
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
</div>

