<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datphong extends Model
{
    use HasFactory;

    protected $fillable = [
        'ngaydat',
        'ngaytra',
        'soluong',
        'phongid',
        'khachhangid',
        'tinhtrangthanhtoan',
        'tinhtrangnhanphong',
        'tinhtrangxuly',
        'huydatphong',
    ];

    public function phongs()
    {
        return $this->belongsToMany(Phong::class, 'danhsachdatphongs', 'datphongid','phongid')->withPivot("ngaybatdauo", "ngayketthuco");
    }

    public function khachhangs()
    {
        return $this->belongsTo(Khachhang::class, 'khachhangid', 'id');
    }

    public function dichvus(){
        return $this->belongsToMany(Dichvu::class,'dichvu_datphongs','datphongid','dichvuid');
    }

    public function anuongs(){
        return $this->belongsToMany(Anuong::class,'anuong_datphongs','datphongid','anuongid')->withPivot('soluong');
    }
    public function anuongdatphongs()
    {
        return $this->hasMany(AnuongDatphong::class, 'datphongid');
    }
    public function dichvudatphongs()
    {
        return $this->hasMany(DichvuDatphong::class, 'datphongid');
    }

    public function thanhtoans()
    {
        return $this->hasMany(Thanhtoan::class, 'datphongid');
    }

}
