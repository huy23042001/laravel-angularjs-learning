<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bill_detail_ban extends Model
{
    protected $table = 'bill_detail_ban';
    use HasFactory;
    public function sanpham(){
        return $this->belongsTo(sanpham::class,'id_sp');
    }

    public function bills_ban(){
        return $this->belongsTo(bills_ban::class,'id_bill_ban');
    }
}
