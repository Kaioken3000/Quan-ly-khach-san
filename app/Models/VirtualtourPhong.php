<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VirtualtourPhong extends Model
{
    use HasFactory;

    protected $fillable = [
        'phongid',
        'virtualtourid',
    ];

    public function phongs()
    {
        return $this->belongsTo(Datphong::class, 'phongid', 'so_phong');
    }
    public function virtualtours()
    {
        return $this->belongsTo(Virtualtour::class, 'virtualtourid', 'id', 'virtualtour_phongs');
    }
}
