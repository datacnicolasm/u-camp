<?php

namespace App\Http\Controllers;

use App\Models\RutaProfesional;
use App\Models\User;
use Illuminate\Http\Request;

class RutaProfesionalController extends Controller
{
    /**
     * View display all tracks
     */
    public function listRutas()
    {
        if (isset($_GET['user'])) {
            $id = $_GET['user'];
            $user = User::find($id);

            // Obtener los primeros 9 cursos
            $rutas = RutaProfesional::take(9)->get();

            return view('rutas.list-rutas')->with(['user' => $user, 'rutas' => $rutas]);
        } else {
            return view('dashboard.dashboard');
        }
    }

    /**
     * View a track
     */
    public function viewRutas(Request $request, RutaProfesional $ruta)
    {
        if (isset($_GET['user'])) {
            $id = $_GET['user'];
            $user = User::find($id);
            return view('rutas.view-ruta')->with(['user' => $user, 'ruta' => $ruta]);

        } else {
            return view('dashboard.dashboard');
        }
    }
}
