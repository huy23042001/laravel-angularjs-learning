<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phan_hoi extends Model
{
    use HasFactory;
    protected $table = 'phan_hoi';
    protected $primaryKey = 'id_phan_hoi';
    public $incrementing = true;
    public function sanpham(){
        return $this->belongsTo(sanpham::class,'id_sp');
    }
    public function user(){
        return $this->belongsTo(users::class,'id_tk');
    }
}
