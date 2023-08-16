<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HinhPhong extends Model
{
    use HasFactory;

    protected $fillable = [
        'phongid',
        'hinhid',
    ];

    public function phongs()
    {
        return $this->belongsTo(Datphong::class, 'phongid', 'so_phong');
    }

    public function hinhs()
    {
        return $this->belongsTo(Hinh::class, 'hinhid', 'id');
    }
}
