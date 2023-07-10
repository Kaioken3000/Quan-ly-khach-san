<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catruc extends Model
{
    use HasFactory;

    protected $fillable = [
        'ten',
        'giobatdau',
        'gioketthuc',
    ];

    public function nhanviens()
    {
        return $this->hasMany(Nhanvien::class, 'catrucid', 'id');
    }
}
