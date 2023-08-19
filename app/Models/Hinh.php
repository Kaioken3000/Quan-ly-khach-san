<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hinh extends Model
{
    use HasFactory;

    protected $fillable = [
        'vitri',
        'phongid'
    ];

    public function phongs()
    {
        return $this->belongsTo(Hinh::class, 'phongid', 'id');
    }
}
