<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Virtualtour extends Model
{
    use HasFactory;

    protected $fillable = [
        'hinh',
        'phongid'
    ];

    public function phongs()
    {
        return $this->belongsTo(Phong::class, 'phongid', 'id');
    }
    public function phongs2()
    {
        return $this->belongsToMany(Phong::class, 'virtualtour_phongs','virtualtourid', 'phongid');
    }
    public function virtualtourphongs()
    {
        return $this->hasMany(VirtualtourPhong::class, 'virtualtourid');
    }
}
