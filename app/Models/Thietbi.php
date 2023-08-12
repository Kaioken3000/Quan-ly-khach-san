<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thietbi extends Model
{
    use HasFactory;

    protected $fillable = [
        'ten',
        'hinh',
        'mieuTa',
        'gia',
        'phongid'
    ];

    public function phongs()
    {
        return $this->belongsTo(Loaiphong::class, 'phongid', 'id');
    }
    public function thietbiphongs()
    {
        return $this->hasMany(ThietbiPhong::class, 'thietbi_phongs');
    }
}
