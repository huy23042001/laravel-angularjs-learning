<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bills_nhap extends Model
{
    protected $table = 'bills_nhap';
    use HasFactory;
    public function ncc(){
        return $this->belongsTo(nha_cung_cap::class,'id_ncc');
    }

    public function nhanvien(){
        return $this->belongsTo(nhanvien::class,'id_nhanvien');
    }
}
