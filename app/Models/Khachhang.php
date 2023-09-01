<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khachhang extends Model
{
    use HasFactory;

    protected $fillable = [
        'ten',
        'sdt',
        'email',
        'diachi',
        'gioitinh',
        'vanbang',
        'userid',
        'diem',
    ];

    // public function users(){
    //     return $this->belongsTo(User::class);
    // }
    public function users()
    {
        return $this->belongsTo(User::class, 'userid', 'id');
    }

    public function datphongs()
    {
        return $this->hasMany(Datphong::class, 'khachhangid', 'id');
    }

    public function chuyenkhoans()
    {
        return $this->hasMany(Chuyenkhoan::class, 'khachhangid', 'id');
    }

}
