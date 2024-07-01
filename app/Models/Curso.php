<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    const DIFICULTAD_PRINCIPIANTE = 0;
    const DIFICULTAD_INTERMEDIO = 1;
    const DIFICULTAD_AVANZADO = 2;

    public static $dificultadTexto = [
        self::DIFICULTAD_PRINCIPIANTE => 'Principiante',
        self::DIFICULTAD_INTERMEDIO => 'Intermedio',
        self::DIFICULTAD_AVANZADO => 'Avanzado',
    ];

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'titulo',
        'tipo',
        'dificultad',
        'descripcion',
        'short_description',
        'long_description',
        'tutor',
        'ruta_profesional_id'
    ];

    /**
     * Get the tracks for the course.
     */
    public function rutaProfesional()
    {
        return $this->belongsTo(RutaProfesional::class);
    }

    /**
     * Get the chapters for the course.
     */
    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
}
