<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phong extends Model
{
    use HasFactory;

    protected $fillable = [
        'so_phong',
        'loaiphongid'
    ];

    protected $primaryKey = 'so_phong';

    public $incrementing = false;

    protected $keyType = 'integer';

    public function loaiphongs()
    {
        return $this->belongsTo(Loaiphong::class);
    }
}
