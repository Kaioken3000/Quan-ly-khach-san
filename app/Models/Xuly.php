<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Xuly extends Model
{
    use HasFactory;

    protected $fillable = [
        'ten',
        'datphongid'
    ];

    protected $table = 'xulys';

    public function datphongs(){
        return $this->hasOne(Datphong::class, 'datphongid', 'id');
    }
}
