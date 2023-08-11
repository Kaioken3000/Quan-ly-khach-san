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
        'mieuTa'
    ];

    public function phongs()
    {
        return $this->belongsTo(Loaiphong::class, 'phongid', 'id');
    }
}
