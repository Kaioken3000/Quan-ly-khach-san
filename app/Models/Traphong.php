<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traphong extends Model
{
    use HasFactory;

    protected $fillable = [
        'so',
        'ten',
        'datphongid',
        'userid'
    ];

    protected $primaryKey = 'so';

    protected $keyType = 'integer';

    public function datphongs(){
        return $this->hasOne(Datphong::class, 'datphongid', 'id');
    }

    public function users(){
        return $this->belongsTo(User::class, 'userid', 'id');
    }
}
