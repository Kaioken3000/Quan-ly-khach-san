<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhsachdatphong extends Model
{
    use HasFactory;

    protected $fillable = [
        'phongid',
        'ngaybatdauo',
        'ngayketthuco',
        'datphongid',
    ];

    public function phongs()
    {
        return $this->belongsTo(Phong::class, 'phongid', 'so_phong');
    }
}
