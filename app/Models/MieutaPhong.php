<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MieutaPhong extends Model
{
    use HasFactory;

    protected $fillable = [
        'phongid',
        'mieutaid',
    ];

    public function phongs()
    {
        return $this->belongsTo(Phong::class, 'phongid', 'so_phong');
    }

    public function mieutas()
    {
        return $this->belongsTo(MieuTa::class, 'mieutaid', 'id');
    }
}
