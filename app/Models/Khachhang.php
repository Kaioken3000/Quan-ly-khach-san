<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khachhang extends Model
{
    use HasFactory;

    protected $fillable = [
        'ten',
        'sdt',
        'email',
        'userid'
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function datphongs()
    {
        return $this->hasMany(Datphong::class, 'khachhangid', 'id');
    }

}
