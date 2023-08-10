<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnuongDatphong extends Model
{
    use HasFactory;

    protected $fillable = [
        'datphongid',
        'anuongid',
        'soluong',
    ];

    public function datphongs(){
        return $this->belongsTo(Datphong::class, 'datphongid', 'id');
    }

    public function anuongs(){
        return $this->belongsTo(Anuong::class, 'anuongid', 'id');
    }
}
