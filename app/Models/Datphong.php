<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datphong extends Model
{
    use HasFactory;

    protected $fillable = [
        'ngaydat',
        'ngaytra',
        'soluong',
        'phongid',
        'khachhangid',
    ];
}
