<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'name', 'email', 'password', 'is_admin', 'opd_id', 'kontak'
    ];
 
    
    public function opd(){
        return $this->belongsTo(Opd::class,'opd_id','id');
    }
    
}