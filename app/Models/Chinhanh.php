<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chinhanh extends Model
{
    use HasFactory;

    protected $fillable = [
        'ten',
        'soluong',
        'thanhpho',
        'quan',
        'sdt',
    ];

    public function hinhs()
    {
        return $this->belongsToMany(Hinh::class, 'hinh_chinhanhs', 'chinhanhid', 'hinhid');
    }
    public function mieutas()
    {
        return $this->belongsToMany(Mieuta::class, 'mieuta_chinhanhs', 'chinhanhid', 'mieutaid');
    }
    public function phongs()
    {
        return $this->hasMany(Phong::class, 'chinhanhid', 'id');
    }

    public function mieutachinhanhs()
    {
        return $this->hasMany(MieutaChinhanh::class, 'chinhanhid');
    }
    public function hinhchinhanhs()
    {
        return $this->hasMany(HinhChinhanh::class, 'chinhanhid');
    }
}
