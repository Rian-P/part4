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
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id('id_mobil');
            $table->string('nama_kendaraan');
            $table->string('tipe');
            $table->string('no_kendaraan');
            $table->string('tahun');
            $table->string('deskripsi',900);
            $table->string('image');
            $table->string('max_penumpang');
            $table->string('harga_24_jam');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};
