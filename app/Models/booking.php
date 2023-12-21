<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;
    protected $primaryKey = 'booking_id';
    protected $fillable = [
        'customer_id',
        'penerbangan_id',
        'waktu',
        'bangku',
        'total_hrg'];

    public function penerbangan()
    {
        return $this->belongsTo(penerbangan::class, 'penerbangan_id');
    }

    public function customer()
    {
        return $this->belongsTo(customer::class, 'customer_id');
    }

    public function pembayaran()
    {
        return $this->hasMany(pembayaran::class, 'booking_id');
    }


}


