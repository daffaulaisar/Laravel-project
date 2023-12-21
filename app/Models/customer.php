<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
     protected $primaryKey = 'customer_id';
    protected $fillable = [
        'NIK',
        'nama_depan',
        'nama_belakang',
        'jenis_kelamin',
        'no_hp',
    ];
 //method utk relasional tabel

    public function booking(){
        return $this->hasMany(booking::class, 'customer_id');
    }

  
}
