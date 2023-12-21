<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penerbangan extends Model
{
    use HasFactory;
    protected $primaryKey = 'penerbangan_id';
    protected $fillable = [
        'pesawat',
        'kota_keberangkatan',
        'kota_kedatangan',
        'tgl_keberangkatan',
        'tgl_kedatangan',
        'harga',
    ];

    public function booking()
    {
        return $this->hasMany(booking::class, 'booking_id');
    }


}
