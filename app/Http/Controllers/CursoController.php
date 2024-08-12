<?php

namespace App\Http\Controllers;

use App\Mail\CampMailableClass;
use App\Models\Curso;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $curso->load(['chapters.lessons' => function ($query) {
            $query->orderBy('order'); // Ordenar las lecciones por el campo 'order'
        }]);

        // Cargar la última lección vista por el usuario
        $lastLessonData = $this->getLastLesson($curso, $request->user());
        $lastLessonId = $lastLessonData['lesson_id'];
        $isFirstLesson = $lastLessonData['is_first'];

        // Verificar si cada lección puede ser vista por el usuario
        foreach ($curso->chapters as $chapter) {
            $chapter->total_lessons = $chapter->lessons->count();
            $chapter->viewed_lessons = 0;
            $canView = $isFirstLesson;

            foreach ($chapter->lessons as $lesson) {
                $lesson->viewed = $request->user()->hasViewedLesson($lesson->id);
                $lesson->enabled = $canView || $lesson->id == $lastLessonId; // Habilitar la lección si es la última vista o si puede ser vista

                if ($lesson->viewed) {
                    $chapter->viewed_lessons++;
                    $canView = true; // Permitir al usuario ver la siguiente lección
                } else {
                    $canView = false; // Detener la habilitación de lecciones si se encuentra una no vista
                }
            }
        }

        return view('curso.detalle-curso')->with([
            'curso' => $curso,
            'lastLesson' => $lastLessonData
        ]);
    }



    /**
     * Obtener la primera lesson del curso
     */
    public static function getLastLesson(Curso $curso, User $user)
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
}
