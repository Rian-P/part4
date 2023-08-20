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
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id('id_pemesanan');
            $table->string('nama_pelanggan');
            $table->string('nama_kendaraan');
            $table->string('tujuan')->nullable();
            $table->string('harga_sewa');
            $table->string('tanggal_ambil');
            $table->string('tanggal_kembali');
            $table->string('sopir');
            $table->string('total_harga');
            $table->string('waktu_ambil');
            $table->string('waktu_kembali');
            $table->string('status_bayar')->nullable();
            $table->string('tujuan_sopir')->nullable();
            $table->string('foto_ktp');
            $table->string('bukti_tf')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
