<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nhanphong extends Model
{
    use HasFactory;

    protected $fillable = [
        'ten',
        'datphongid',
        'userid'
    ];

    public function datphongs()
    {
        return $this->hasOne(Datphong::class, 'datphongid', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'userid', 'id');
    }
}
