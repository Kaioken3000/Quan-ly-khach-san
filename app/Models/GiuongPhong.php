<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiuongPhong extends Model
{
    use HasFactory;

    protected $fillable = [
        'phongid',
        'giuongid',
    ];

    public function phongs()
    {
        return $this->belongsTo(Phong::class, 'phongid', 'so_phong');
    }

    public function giuongs()
    {
        return $this->belongsTo(Giuong::class, 'giuongid', 'id');
    }
}
