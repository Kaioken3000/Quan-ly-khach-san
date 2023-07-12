<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    use HasFactory;
    protected $fillable = [
        'ngaycheckin',
        'giocheckin',
        'ngaycheckout',
        'giocheckout',
        'nhanvienid',
    ];

    public function nhanviens()
    {
        return $this->belongsTo(Nhanvien::class, 'nhanvienid','ma');
    }
}
