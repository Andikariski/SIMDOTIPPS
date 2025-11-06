<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AktivitasUtama extends Model
{
    protected $table = 'tbl_aktivitas_utama';

    protected $fillable = [
        'aktivitas_utama',
        'tema_pembangunan',
        'program_prioritas',
        'target_keluaran_strategis',
    ];
}
