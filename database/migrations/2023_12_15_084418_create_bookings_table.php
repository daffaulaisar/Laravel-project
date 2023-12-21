<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('booking_id');
            $table->unsignedBigInteger('customer_id'); //relasi dengan tabel customer
            $table->unsignedBigInteger('penerbangan_id');// relasi dengan tebel penerbangan
            $table->dateTime('waktu');
            $table-> string('bangku');
            $table->string('total_hrg');
            $table->timestamps();

           // $table->foreign('customer_id')->references('customer_id',)->on('customers');
            //$table->foreign('penerbangan_id')->references('penerbangan_id')->on('penerbangans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
