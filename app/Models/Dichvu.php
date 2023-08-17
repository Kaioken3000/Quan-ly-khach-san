<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dichvu extends Model
{
    use HasFactory;

    protected $fillable = [
        'ten',
        'giatien',
        'donvi',
        'chinhanhid',
    ];

    public function chinhanhs()
    {
        return $this->belongsTo(Chinhanh::class, 'chinhanhid', 'id');
    }

    public function datphongs()
    {
        return $this->belongsToMany(Datphong::class, 'dichvu_datphong', 'datphongid', 'dichvuid');
    }
}
