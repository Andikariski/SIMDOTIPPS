<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontrol extends Model
{    protected $table = 'tbl_kontrol';
     protected $fillable = ['nama', 'status'];
}
