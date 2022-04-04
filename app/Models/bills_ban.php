<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bills_ban extends Model
{
    protected $table = 'bills_ban';
    use HasFactory;
    public function kh(){
        return $this->belongsTo(khach_hang::class,'id_kh');
    }
}
