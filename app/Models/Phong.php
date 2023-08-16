<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phong extends Model
{
    use HasFactory;

    protected $fillable = [
        'so_phong',
        'picture_1',
        'picture_2',
        'picture_3',
        'loaiphongid',
        'chinhanhid',
    ];

    protected $primaryKey = 'so_phong';

    public $incrementing = false;

    protected $keyType = 'integer';

    public function loaiphongs()
    {
        return $this->belongsTo(Loaiphong::class, 'loaiphongid', 'ma');
    }
    public function chinhanhs()
    {
        return $this->belongsTo(Chinhanh::class, 'chinhanhid', 'id');
    }

    /**
     * The thietbis that belong to the Phong
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function thietbis()
    {
        return $this->belongsToMany(Thietbi::class, 'thietbi_phongs', 'phongid', 'thietbiid');
    }
    /**
     * The giuongs that belong to the Phong
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function giuongs()
    {
        return $this->belongsToMany(Giuong::class, 'giuong_phongs', 'phongid', 'giuongid');
    }
    /**
     * The hinhs that belong to the Phong
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function hinhs()
    {
        return $this->belongsToMany(Hinh::class, 'hinh_phongs', 'phongid', 'hinhid');
    }
    /**
     * The mieutas that belong to the Phong
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function mieutas()
    {
        return $this->belongsToMany(Mieuta::class, 'mieuta_phongs', 'phongid', 'mieutaid');
    }

    public function thietbiphongs()
    {
        return $this->hasMany(ThietbiPhong::class, 'phongid');
    }
    public function giuongphongs()
    {
        return $this->hasMany(GiuongPhong::class, 'phongid');
    }
    public function mieutaphongs()
    {
        return $this->hasMany(MieutaPhong::class, 'phongid');
    }
    public function hinhphongs()
    {
        return $this->hasMany(HinhPhong::class, 'phongid');
    }
}
