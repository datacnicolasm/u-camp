<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Lesson;
use App\Models\Point;
use App\Models\Puc;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LessonController extends Controller
{
    /**
     * Display view for a lesson
     */
    public function viewLesson(Request $request, Curso $curso, Lesson $lesson)
    {
        $user = $request->user();

        // Cargar las relaciones chapters y lessons
        $curso->load('chapters.lessons');

        // Condicional para cargar video
        if ($lesson->type == "video") {
            // Registrar la lección vista
            $user->lessons()->syncWithoutDetaching([$lesson->id]);

            // Cuando un usuario completa una lección, se debe registrar en el modelo Point.
            Point::completeLesson($user, $lesson, 'lesson_video');
        }

        // Carrgar la relacion de questions
        if ($lesson->type == "questionnaire") {
            $lesson->load('question');
        }

        // Condicional para cargar leccion DIAN
        if ($lesson->type == "dian") {
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

        return view('curso.view-curso')->with([
            'curso' => $curso,
            'lesson' => $lesson
        ]);
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
}
