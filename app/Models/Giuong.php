<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Giuong extends Model
{
    use HasFactory;

    protected $fillable = [
        'ten',
        'kichthuoc',
        'donvi',
        'hinh',
        'gia',
        'mieuTa',
        'phongid',
    ];

    public function phongs()
    {
        return $this->belongsTo(Phong::class, 'phongid', 'id');
    }
}
