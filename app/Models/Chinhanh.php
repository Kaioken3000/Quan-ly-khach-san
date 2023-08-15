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

    public function mieutachinhanhs()
    {
        return $this->hasMany(MieutaChinhanh::class, 'chinhanhid');
    }
    public function hinhchinhanhs()
    {
        return $this->hasMany(HinhChinhanh::class, 'chinhanhid');
    }
}
