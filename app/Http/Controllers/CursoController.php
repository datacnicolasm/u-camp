<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\User;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * View display all courses
     */
    public function listCursos()
    {
        // Obtener los primeros 9 cursos
        $cursos = Curso::take(9)->get();

        return view('curso.list-curso')->with(['cursos' => $cursos]);
    }

    /**
     * View one curso
     */
    public function viewCursos(Request $request, Curso $curso)
    {      
        // Cargar las relaciones chapters y lessons
        $curso->load('chapters.lessons');

        // Cargar la última lección vista por el usuario
        $lastLesson = $this->getLastLesson($curso, $request->user());

        // Verificar si cada lección ha sido vista por el usuario
        foreach ($curso->chapters as $chapter) {
            $chapter->total_lessons = $chapter->lessons->count();
            $chapter->viewed_lessons = 0;

            foreach ($chapter->lessons as $lesson) {
                $lesson->viewed = $request->user()->hasViewedLesson($lesson->id);
                if ($lesson->viewed) {
                    $chapter->viewed_lessons++;
                }
            }
        }
        
        return view('curso.detalle-curso')->with(['curso' => $curso, 'lastLesson' => $lastLesson]);
    }

    /**
     * Obtener la primera lesson del curso
     */
    public function getLastLesson(Curso $curso, User $user)
    {
        // Obtener todas las lecciones del curso
        $lessons = $curso->lessons()->orderBy('id')->get();

        // Obtener las lecciones que ha visto el usuario
        $viewedLessons = $user->lessons()->whereIn('lesson_id', $lessons->pluck('id'))->orderBy('lesson_user.created_at', 'desc')->get();

        if ($viewedLessons->isEmpty()) {
            // Si el usuario no ha visto ninguna lección, retornar la primera lección del curso
            $firstLesson = $lessons->first();
            return [
                'lesson_id' => $firstLesson->id,
                'is_first' => true,
            ];
        } else {
            // Retornar la última lección vista por el usuario
            $lastLesson = $viewedLessons->first();
            return [
                'lesson_id' => $lastLesson->id,
                'is_first' => false,
            ];
        }
    }

    /**
     * View de formulario DIAN
     */
    public function formularioDIAN(Request $request, Curso $curso)
    {
        return view('curso.dian-components.formulario-110-dian')->with(['curso' => $curso]);
    }
}
