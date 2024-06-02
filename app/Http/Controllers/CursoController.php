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
        if (isset($_GET['user'])) {
            $id = $_GET['user'];
            $user = User::find($id);

            // Obtener los primeros 9 cursos
            $cursos = Curso::take(9)->get();

            return view('curso.list-curso')->with(['user' => $user, 'cursos' => $cursos]);
        } else {
            return view('dashboard.dashboard');
        }
    }

    /**
     * View one curso
     */
    public function viewCursos(Request $request, Curso $curso)
    {      
        if (isset($_GET['user'])) {
            $id = $_GET['user'];
            $user = User::find($id);
            return view('curso.view-curso')->with(['user' => $user, 'curso' => $curso]);

        } else {
            return view('dashboard.dashboard');
        }
    }
}
