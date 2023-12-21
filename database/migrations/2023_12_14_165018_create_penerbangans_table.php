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
        Schema::create('penerbangans', function (Blueprint $table) {
            $table->id('penerbangan_id');
            $table->string('pesawat');
            $table->string('kota_keberangkatan');
            $table->string('kota_kedatangan');
            $table->dateTime('tgl_keberangkatan');
            $table->dateTime('tgl_kedatangan');
            $table->bigInteger('harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerbangans');
    }
};
