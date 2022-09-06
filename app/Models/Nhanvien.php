<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nhanvien extends Model
{
    use HasFactory;

    protected $fillable = [
        'ma',
        'ten',
        'luong'
    ];

    protected $primaryKey = 'ma';

    public $incrementing = false;

    protected $keyType = 'string';
}
