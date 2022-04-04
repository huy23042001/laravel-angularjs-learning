<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bills_detail_nhap extends Model
{
    protected $table = 'bill_detail_nhap';
    use HasFactory;
    public function bills_nhap(){
        return $this->belongsTo(bills_nhap::class,'id_bill_nhap');
    }

    public function sanpham(){
        return $this->belongsTo(sanpham::class,'id_sp');
    }

}
