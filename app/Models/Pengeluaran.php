<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $table = 'pengeluaran';

    use HasFactory;
    protected $fillable = [
        'nama_pengeluaran',
        'total_pengeluaran',
    ];
}
