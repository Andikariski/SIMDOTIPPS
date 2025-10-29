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
                <button type="button" class="btn btn-primary" wire:click="simpanRap">
                    <i class="bi bi-plus-lg"></i> Input RAP
                </button>
            </div>
        </div>
        <div class="rounded-1 overflow-hidden border p-0 table-responsive" >
        
        </div>    
    </div>   
     <div class="mt-4">
        {{-- {{ $pagus->links('vendor.livewire.bootstrap-pagination') }} --}}
    </div>
</div>

</div>


<script>
    $('#kegiatan').select2({
        width: '50%'
    })
</script>


