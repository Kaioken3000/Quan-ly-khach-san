<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatrucNhanvien extends Model
{
    use HasFactory;

    protected $fillable = [
        'catrucid',
        'nhanvienid',
        'ngaybatdau',
        'ngayketthuc',
    ];

    public function catrucs(){
        return $this->belongsTo(Catruc::class, 'catrucid', 'id');
    }

    public function nhanviens(){
        return $this->belongsTo(Nhanvien::class, 'nhanvienid', 'id');
    }
}
