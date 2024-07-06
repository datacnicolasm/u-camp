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
        
        return view('curso.detalle-curso')->with(['curso' => $curso]);
    }

    /**
     * View de formulario DIAN
     */
    public function formularioDIAN(Request $request, Curso $curso)
    {
        return view('curso.dian-components.formulario-110-dian')->with(['curso' => $curso]);
    }
}
