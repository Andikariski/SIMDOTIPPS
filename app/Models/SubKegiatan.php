<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubKegiatan extends Model
{
    protected $table = 'tbl_sub_kegiatan';

    protected $fillable = [
        'kewenangan',
        'kode_klasifikasi',
        'sub_kegiatan',
        'kinerja',
        'indikator',
        'satuan',
        'klasifikasi_belanja',
    ];
    
}
