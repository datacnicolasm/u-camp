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
        $rutas = RutaProfesional::get();

        return view('rutas.list-rutas')->with(['rutas' => $rutas]);
    }

    /**
     * View a track
     */
    public function viewRutas(Request $request, RutaProfesional $ruta)
    {
        return view('rutas.view-ruta')->with(['ruta' => $ruta]);
    }
}
