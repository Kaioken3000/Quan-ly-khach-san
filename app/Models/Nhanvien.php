<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Nhanvien extends Model
{
    use HasFactory;

    protected $fillable = [
        'ma',
        'ten',
        'luong'
    ];

    protected $primaryKey = 'ma';

    public $incrementing = false;

    protected $keyType = 'string';

    // public function catrucs() {
    //     return $this->belongsToMany('App\Models\Catruc', 'catruc_nhanviens', 'catrucid', 'nhanvienid');
    //   }
    // public function catrucs(): MorphToMany
    // {
    //     return $this->morphToMany(CatrucNhanvien::class, 'catruc');
    // }

    public function catrucs()
    {
        // return $this->belongsToMany(Catruc::class, 'catruc_nhanvies' ,'nhanvienid', 'catrucid' );
        return $this->hasMany(CatrucNhanvien::class, 'nhanvienid', 'ma');
    }
}
