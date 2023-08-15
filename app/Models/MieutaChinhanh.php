<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MieutaChinhanh extends Model
{
    use HasFactory;

    protected $fillable = [
        'chinhanhid',
        'mieutaid',
    ];

    public function chinhanhs()
    {
        return $this->belongsTo(Phong::class, 'chinhanhid', 'id');
    }

    public function mieutas()
    {
        return $this->belongsTo(MieuTa::class, 'mieutaid', 'id');
    }
}
