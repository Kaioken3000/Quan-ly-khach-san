<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThietbiPhong extends Model
{
    use HasFactory;

    protected $fillable = [
        'phongid',
        'thietbiid',
    ];

    public function phongs()
    {
        return $this->belongsTo(Phong::class, 'phongid');
    }

    public function thietbis()
    {
        return $this->belongsTo(Thietbi::class, 'thietbiid');
    }
}
