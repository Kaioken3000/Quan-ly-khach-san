<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HinhChinhanh extends Model
{
    use HasFactory;

    protected $fillable = [
        'chinhanhid',
        'hinhid',
    ];

    public function chinhanhs()
    {
        return $this->belongsTo(Phong::class, 'chinhanhid', 'id');
    }

    public function hinhs()
    {
        return $this->belongsTo(MieuTa::class, 'hinhid', 'id');
    }
}
