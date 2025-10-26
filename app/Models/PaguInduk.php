<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaguInduk extends Model
{
    protected $table = 'tbl_pagu_induk';

    protected $fillable = [
        'pagu_SG',
        'pagu_BG',
        'pagu_DTI',
        'tahun_pagu',
    ];
}
