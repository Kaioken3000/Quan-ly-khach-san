<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DichvuDatphong extends Model
{
    use HasFactory;

    protected $fillable = [
        'datphongid',
        'dichvuid',
    ];

    public function datphongs(){
        return $this->belongsTo(Datphong::class, 'datphongid', 'id');
    }

    public function dichvus(){
        return $this->belongsTo(Dichvu::class, 'dichvuid', 'id');
    }
}
