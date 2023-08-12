<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phong extends Model
{
    use HasFactory;

    protected $fillable = [
        'so_phong',
        'picture_1',
        'picture_2',
        'picture_3',
        'loaiphongid'
    ];

    protected $primaryKey = 'so_phong';

    public $incrementing = false;

    protected $keyType = 'integer';

    public function loaiphongs()
    {
        return $this->belongsTo(Loaiphong::class, 'loaiphongid','ma');
    }

    public function thietbiphongs()
    {
        return $this->hasMany(ThietbiPhong::class, 'phongid');
    }
    public function giuongphongs()
    {
        return $this->hasMany(GiuongPhong::class, 'phongid');
    }
    public function mieutaphongs()
    {
        return $this->hasMany(MieutaPhong::class, 'phongid');
    }
    public function hinhphongs()
    {
        return $this->hasMany(HinhPhong::class, 'phongid');
    }
}
