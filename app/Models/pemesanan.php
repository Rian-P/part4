<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pemesanan';

    protected $table = 'pemesanans';

    protected $fillable = [
        'nama_pelanggan',
        'nama_kendaraan',
        'tujuan',
        'harga_sewa',
        'total_harga',
        'tanggal_ambil',
        'tanggal_kembali',
        'sopir',
        'waktu_ambil',
        'waktu_kembali',
        'foto_ktp',
        'bukti_tf',
        'status_bayar',
        'tujuan_sopir',
        'status'
    ];
}
