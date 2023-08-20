<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataharga extends Model
{
    protected $table = 'dataharga';

    use HasFactory;

    protected $primaryKey = 'id';

    protected $guard = ['id'];
    protected $fillable = [
       'harga'
    ];

}
