<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'nombre_institucion',
        'pais_docente',
        'departamento_docente',
        'conocimiento_docente'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
