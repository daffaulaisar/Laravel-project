<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    use HasFactory;
     protected $primaryKey = 'pembayaran_id';
     protected $fillable = [
    'booking_id', 
    'waktu', 
    'metode',
    'total', 
    ];

    public function booking(){
        return $this->belongsTo(booking::class, 'booking_id');
    }

   

}
