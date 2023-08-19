<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mieuta extends Model
{
    use HasFactory;

    protected $fillable = [
        'noidung',
        'hinh',
        'phongid'
    ];

    public function phongs()
    {
        return $this->belongsTo(Hinh::class, 'phongid', 'id');
    }
}
