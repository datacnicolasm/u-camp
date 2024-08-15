<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Lesson;
use App\Models\Point;
use App\Models\Puc;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class LessonController extends Controller
{
    public function createLesson(Request $request)
    {
        try {
            Log::info($request->all());

            Lesson::create([
                'title' => $request->input('titulo_actividad'),
                'type' => $request->input('tipo_actividad'),
                'use_type' => 'group',
                'points_xp' => $request->input('puntos_xp'),
                'order' => $request->input('orden'),
                'group_id' => $request->input('grupo_id'),
                'user_id' => $request->user()->id,
                'expires_at' => Carbon::parse($request->input('vencimiento')),
            ]);

            return redirect()->route('list-cursos');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Hubo un problema al crear el recurso.']);
        }
    }

    /**
     * Display view for a lesson
     */
    public function viewLesson(Request $request, Curso $curso, Lesson $lesson)
    {
        $user = $request->user();

        // Cargar las relaciones chapters y lessons ordenadas por 'order'
        $this->loadChaptersAndLessons($curso);

        // Procesar y registrar la lección vista por el usuario si aplica
        $this->processLesson($user, $lesson);

        // Verificar si la lección es del tipo DIAN y manejar el flujo específico
        if ($lesson->type === "dian") {
            return $this->handleDianLesson($curso, $lesson);
        }

        // Calcular el progreso del curso
        $courseProgress = $this->calculateCourseProgress($curso, $user);

        // Verificar y habilitar lecciones basadas en el progreso del usuario
        $this->checkAndEnableLessons($curso, $user);

        return view('curso.view-curso')->with([
            'curso' => $curso,
            'lesson' => $lesson,
            'courseProgress' => $courseProgress // Pasar el progreso del curso a la vista
        ]);
    }

    /**
     * Cargar las relaciones chapters y lessons, ordenadas por 'order'.
     *
     * @param Curso $curso
     * @return void
     */
    private function loadChaptersAndLessons(Curso $curso)
    {
        $curso->load(['chapters.lessons' => function ($query) {
            $query->orderBy('order'); // Ordenar las lecciones por el campo 'order'
        }]);
    }

    /**
     * Procesar la lección según su tipo y registrar la lección vista por el usuario.
     *
     * @param User $user
     * @param Lesson $lesson
     * @return void
     */
    private function processLesson(User $user, Lesson $lesson)
    {
        if ($lesson->type === "video") {
            // Registrar la lección vista
            $user->lessons()->syncWithoutDetaching([$lesson->id]);

            // Registrar en el modelo Point cuando un usuario completa una lección.
            Point::completeLesson($user, $lesson, 'lesson_video');
        } elseif ($lesson->type === "questionnaire") {
            // Cargar la relación de questions
            $lesson->load('question');
        }
    }

    /**
     * Manejar el flujo específico para lecciones del tipo DIAN.
     *
     * @param Curso $curso
     * @param Lesson $lesson
     * @return \Illuminate\View\View
     */
    private function handleDianLesson(Curso $curso, Lesson $lesson)
    {
        // Ruta al archivo JSON
        $jsonPath = database_path('data/guia.json');

        // Leer el contenido del archivo JSON
        if (File::exists($jsonPath)) {
            $json = File::get($jsonPath);
            $guia_DIAN = json_decode($json, true);
        }

        return view('curso.view-curso')->with([
            'curso' => $curso,
            'lesson' => $lesson,
            'guia' => $guia_DIAN
        ]);
    }

    /**
     * Calcular el progreso del curso basado en las lecciones vistas por el usuario.
     *
     * @param Curso $curso
     * @param User $user
     * @return int $courseProgress
     */
    private function calculateCourseProgress(Curso $curso, User $user)
    {
        $totalLessonsInCourse = 0;
        $viewedLessonsInCourse = 0;

        foreach ($curso->chapters as $chapter) {
            $chapter->total_lessons = $chapter->lessons->count();
            $chapter->viewed_lessons = 0;

            $totalLessonsInCourse += $chapter->total_lessons;

            foreach ($chapter->lessons as $chapterLesson) {
                $chapterLesson->viewed = $user->hasViewedLesson($chapterLesson->id);
                if ($chapterLesson->viewed) {
                    $chapter->viewed_lessons++;
                    $viewedLessonsInCourse++;
                }
            }
        }

        return $totalLessonsInCourse > 0
            ? round(($viewedLessonsInCourse / $totalLessonsInCourse) * 100)
            : 0;
    }

    /**
     * Verificar y habilitar lecciones basadas en el progreso del usuario.
     *
     * @param Curso $curso
     * @param User $user
     * @return void
     */
    private function checkAndEnableLessons(Curso $curso, User $user)
    {
        // Cargar la última lección vista por el usuario
        $lastLessonData = CursoController::getLastLesson($curso, $user);
        $lastLessonId = $lastLessonData['lesson_id'];
        $isFirstLesson = $lastLessonData['is_first'];

        foreach ($curso->chapters as $chapter) {
            $chapter->total_lessons = $chapter->lessons->count();
            $chapter->viewed_lessons = 0;
            $canView = $isFirstLesson;

            foreach ($chapter->lessons as $chapLesson) {
                $chapLesson->viewed = $user->hasViewedLesson($chapLesson->id);
                $chapLesson->enabled = $canView || $chapLesson->id == $lastLessonId; // Habilitar la lección si es la última vista o si puede ser vista

                if ($chapLesson->viewed) {
                    $chapter->viewed_lessons++;
                    $canView = true; // Permitir al usuario ver la siguiente lección
                } else {
                    $canView = false; // Detener la habilitación de lecciones si se encuentra una no vista
                }
            }
        }
    }


    /**
     * 
     */
    public function getGuiaJSON(Request $request)
    {
        // Ruta al archivo JSON
        $jsonPath = database_path('data/guia.json');

        // Leer el contenido del archivo JSON
        if (File::exists($jsonPath)) {
            $json = File::get($jsonPath);
            $guia = json_decode($json, true);
        }

        return response()->json([
            'data' => $guia
        ]);
    }

    /**
     * View de formulario DIAN
     */
    public function formularioDIAN(Request $request, Curso $curso, Lesson $lesson)
    {
        // Ruta al archivo JSON
        $jsonPath = database_path('data/campos-110.json');

        // Leer el contenido del archivo JSON
        if (File::exists($jsonPath)) {
            $json = File::get($jsonPath);
            $campos_DIAN = json_decode($json, true);
        }

        // Ruta al archivo JSON
        $jsonPath = database_path('data/guia.json');

        // Leer el contenido del archivo JSON
        if (File::exists($jsonPath)) {
            $json = File::get($jsonPath);
            $guia_DIAN = json_decode($json, true);
        }

        $lesson->load('workshop.laws', 'workshop.statements.entry');

        return view('curso.dian-components.formulario-110-dian')->with([
            'campos'    => $campos_DIAN,
            'curso'     => $curso,
            'lesson'    => $lesson,
            'guia' => $guia_DIAN
        ]);
    }

    public function markAsViewed(Request $request, Lesson $lesson)
    {
        $user = $request->user();

        // Registrar la lección vista
        $user->lessons()->syncWithoutDetaching([$lesson->id]);

        // Cuando un usuario completa una lección, se debe registrar en el modelo Point.
        Point::completeLesson($user, $lesson, $request->input('activity_type'));

        return response()->json([
            'data' => true,
        ]);
    }

    public function verifyResponse(Request $request, Lesson $lesson)
    {
        $user = $request->user();

        // Cargar la relación question de la lección
        $lesson->load('question');

        // Validar la opción seleccionada
        $request->validate([
            'option' => 'required|integer|between:1,4',
        ]);

        $selectedOption = $request->input('option');

        // Comparar la opción seleccionada con la opción correcta
        if ($selectedOption == $lesson->question->correct_option) {
            // Registrar la lección vista
            $user->lessons()->syncWithoutDetaching([$lesson->id]);

            // Cuando un usuario completa una lección, se debe registrar en el modelo Point.
            Point::completeLesson($user, $lesson, 'questionnaire');

            return response()->json([
                'data' => [
                    'success' => true,
                    'message' => 'Respuesta correcta'
                ]
            ]);
        } else {
            return response()->json([
                'data' => [
                    'success' => false,
                    'message' => 'Respuesta incorrecta'
                ]
            ]);
        }
    }

    public function getCuentas(Request $request)
    {
        // Obtener toda las cuentas
        $cuentas = Puc::get();

        return response()->json([
            'data' => $cuentas
        ]);
    }

    public function deleteLesson(Request $request)
    {
        // Validar el ID del grupo
        $request->validate([
            'id' => 'required|exists:lessons,id'
        ]);

        // Buscar y eliminar el grupo
        $lesson = Lesson::find($request->id);

        if ($lesson) {
            $lesson->activo = 0;
            $lesson->save();
            return response()->json(['message' => 'Recurso marcado correctamente.'], 200);
        }

        return response()->json(['message' => 'Recurso no encontrado.'], 404);
    }
}
