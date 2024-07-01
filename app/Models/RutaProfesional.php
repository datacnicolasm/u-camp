<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RutaProfesional extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'short_description',
        'long_description',
    ];

    public function cursos()
    {
        return $this->hasMany(Curso::class);
    }
}
