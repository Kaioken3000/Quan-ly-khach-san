<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Huydatphong extends Model
{
    use HasFactory;

    protected $fillable = [
        'so',
        'ten',
        'datphongid',
    ];

    protected $primaryKey = 'so';

    protected $keyType = 'integer';

    public function datphongs(){
        return $this->hasOne(Datphong::class, 'datphongid', 'id');
    }
}
