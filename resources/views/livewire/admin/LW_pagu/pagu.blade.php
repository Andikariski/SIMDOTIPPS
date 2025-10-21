<div>
    <div class="card text-white shadow-sm border-0" style="background: linear-gradient(135deg, #219EBC 0%,  #4f46e5 100%);">
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
    </div>
    <div class="mt-5">
        <div class="row align-items-center mb-3 mt-4">
            <div class="col-md-4">
                <input type="text" placeholder="Search..." wire:model.live="search" class="form-control rounded-1">
            </div>
            <div class="col-md-3">
                <select class="form-control">
                    <option selected>--Pilih Tahun--</option>
                    <option>2025</option>
                    <option>2026</option>
                    <option>2027</option>
                </select>
            </div>
        </div>

        <div  iv class="rounded-1 overflow-hidden border p-0">
            <table class="table table-striped align-middle mb-0">
                <thead class="table-secondary">
                    <tr>
                        <th class="px-4 py-2 text-dark">Sumber Dana</th>
                        <th class="px-4 py-2 text-dark">Tahun</th>
                        <th class="px-4 py-2 text-dark">Besaran Pagu</th>
                    </tr>
                </thead>
            </table>
        </div>    
    </div>   
</div>
