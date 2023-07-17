<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $table = 'kendaraans';

    use HasFactory;

    protected $primaryKey = 'id_mobil';

    protected $fillable = [
        'nama_kendaraan',
        'tipe',
        'no_kendaraan',
        'tahun',
        'harga_12_jam',
        'harga_24_jam',
        'deskripsi',
        'image',
    ];

    public function getRouteKeyName()
    {
        return 'nama_kendaraan';
    }
}
