<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loaiphong extends Model
{
    use HasFactory;

    protected $fillable = [
        'ma',
        'ten',
        'gia',
        'mieuTa'
    ];

    protected $primaryKey = 'ma';

    public $incrementing = false;

    protected $keyType = 'string';


    public function phongs()
    {
        return $this->hasMany(Phong::class);
    }
}
