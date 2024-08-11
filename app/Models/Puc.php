<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puc extends Model
{
    use HasFactory;

    protected $fillable = [
        'grupo_1',
        'grupo_2',
        'grupo_3',
        'codigo_cuenta',
        'nombre_cuenta'
    ];
}
