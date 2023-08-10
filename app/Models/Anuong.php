<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anuong extends Model
{
    use HasFactory;

    protected $fillable = [
        'ten',
        'hinh',
        'gia',
        'soluong',
        'mieuTa',
    ];

    public function datphongs()
    {
        return $this->belongsToMany(Datphong::class, 'anuong_datphong', 'datphongid', 'anuongid');
    }
}