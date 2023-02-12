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
    ];

    public function datphongs(){
        return $this->belongsToMany(Datphong::class,'dichvu_datphong','datphongid','dichvuid');
    }
}
