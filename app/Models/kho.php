<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kho extends Model
{
    use HasFactory;
    protected $table = 'kho';
    public function sanpham(){
        return $this->belongsTo(sanpham::class,'id_sp');
    }
} 
