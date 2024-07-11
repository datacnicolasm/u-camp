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

    public function lessons()
    {
        return $this->hasManyThrough(Lesson::class, Chapter::class);
    }

    public static function getPreviousLesson($lessonId)
    {
        // Obtener la lección actual
        $currentLesson = Lesson::find($lessonId);

        if (!$currentLesson) {
            return null; // O manejar el caso de que la lección no se encuentre
        }

        // Obtener la lección anterior en el mismo capítulo
        $previousLesson = Lesson::where('chapter_id', $currentLesson->chapter_id)
                                ->where('order', '<', $currentLesson->order)
                                ->orderBy('order', 'desc')
                                ->first();

        if ($previousLesson) {
            return $previousLesson;
        }

        // Si no hay lección anterior en el mismo capítulo, buscar en el capítulo anterior
        $currentChapter = $currentLesson->chapter;
        $previousChapter = Chapter::where('curso_id', $currentChapter->curso_id)
                                  ->where('id', '<', $currentChapter->id)
                                  ->orderBy('id', 'desc')
                                  ->first();

        if ($previousChapter) {
            return $previousChapter->lessons()->orderBy('order', 'desc')->first();
        }

        // Si no hay más capítulos o lecciones, retornar null
        return null;
    }

    public static function getNextLesson($lessonId)
    {
        // Obtener la lección actual
        $currentLesson = Lesson::find($lessonId);

        if (!$currentLesson) {
            return null; // O manejar el caso de que la lección no se encuentre
        }

        // Obtener la siguiente lección en el mismo capítulo
        $nextLesson = Lesson::where('chapter_id', $currentLesson->chapter_id)
                            ->where('order', '>', $currentLesson->order)
                            ->orderBy('order', 'asc')
                            ->first();

        if ($nextLesson) {
            return $nextLesson;
        }

        // Si no hay siguiente lección en el mismo capítulo, buscar en el siguiente capítulo
        $currentChapter = $currentLesson->chapter;
        $nextChapter = Chapter::where('curso_id', $currentChapter->curso_id)
                              ->where('id', '>', $currentChapter->id)
                              ->orderBy('id', 'asc')
                              ->first();
        
        if ($nextChapter) {
            return $nextChapter->lessons()->orderBy('order', 'asc')->first();
        }

        // Si no hay más capítulos o lecciones, retornar null
        return null;
    }
}
