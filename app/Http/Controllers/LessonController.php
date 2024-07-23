<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display view for a lesson
     */
    public function viewLesson(Request $request, Curso $curso, Lesson $lesson)
    {
        $user = $request->user();

        // Marcar la lección como vista
        $user->lessons()->syncWithoutDetaching([$lesson->id]);

        if ($lesson->type == "questionnaire"){
            $lesson->load('question');       
        }

        return view('curso.view-curso')->with([
            'curso' => $curso,
            'lesson' => $lesson
        ]);
    }

    /**
     * View de formulario DIAN
     */
    public function formularioDIAN(Request $request, Curso $curso, Lesson $lesson)
    {
        return view('curso.dian-components.formulario-110-dian')->with([
            'curso' => $curso,
            'lesson' => $lesson
        ]);
    }

    public function markAsViewed(Request $request, Lesson $lesson)
    {
        $user = $request->user();

        // Registrar la lección vista
        $user->lessons()->syncWithoutDetaching([$lesson->id]);

        return response()->json([
            'message' => 'Lección marcada como vista.',
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
}
