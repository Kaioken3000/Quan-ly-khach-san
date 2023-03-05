<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thanhtoan extends Model
{
    use HasFactory;

    protected $fillable = [
        'hinhthuc',
        'gia',
        'loaitien',
        'chuyenkhoan_token',
        'khachhangid',
    ];
}
