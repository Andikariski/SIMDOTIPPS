<div>
    <div class="card text-white shadow-sm border-0" style="background: linear-gradient(135deg, #219EBC 0%,  #4f46e5 100%);">
        <div class="row">
            <div class="col-3">
                <div class="card-body">
                    <h5 class="card-title">Total Penyerapan</h5>
                    <h3 class="fw-bold">85%</h3>
                    <p class="mb-0">Tahun Anggaran 2025</p>
                </div>
            </div>
            <div class="col-3">
                <div class="card-body">
                    <h5 class="card-title">Total Penyerapan</h5>
                    <h3 class="fw-bold">85%</h3>
                    <p class="mb-0">Tahun Anggaran 2025</p>
                </div>
            </div>
            <div class="col-3">
                <div class="card-body">
                    <h5 class="card-title">Total Penyerapan</h5>
                    <h3 class="fw-bold">85%</h3>
                    <p class="mb-0">Tahun Anggaran 2025</p>
                </div>
            </div>
            <div class="col-3">
                <div class="card-body">
                    <h5 class="card-title">Total Penyerapan</h5>
                    <h3 class="fw-bold">85%</h3>
                    <p class="mb-0">Tahun Anggaran 2025</p>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3 mt-4">
            <input type="text" placeholder="Search..." wire:model.live="search" class="form-control w-25 rounded-1">
        
            <button type="button" class="btn btn-primary w-20" wire:click="openTambahModal">
                <i class="bi bi-plus-lg"></i> Tambah OPD
            </button>
        </div>
        <div  iv class="rounded-1 overflow-hidden border p-0">
            <table class="table table-striped align-middle mb-0">
                <thead class="table-secondary">
                    <tr>
                        <th class="px-4 py-2 text-dark">Nama OPD</th>
                        {{-- <th class="px-4 py-2 text-dark">Alamat OPD</th> --}}
                        <th class="px-4 py-2 text-dark">Kode OPD</th>
                        <th class="px-4 py-2 text-dark">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>    
    </div>   
</div>
