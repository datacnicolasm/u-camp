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

        return view('curso.view-curso')->with([
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
}
