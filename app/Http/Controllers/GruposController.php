<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GruposController extends Controller
{
    public function dashboardGrupos()
    {
        return view('grupos.dashboard');
    }

    public function listGroups()
    {
        return view('grupos.list-groups');
    }

    public function getGroup(Request $request)
    {
        $group = Group::find($request->id);

        return response()->json(['data' => $group]);
    }

    public function deleteGroup(Request $request)
    {
        // Validar el ID del grupo
        $request->validate([
            'id' => 'required|exists:groups,id'
        ]);

        // Buscar y eliminar el grupo
        $group = Group::find($request->id);

        if ($group) {
            $group->delete();
            return response()->json(['message' => 'Grupo eliminado correctamente.'], 200);
        }

        return response()->json(['message' => 'Grupo no encontrado.'], 404);
    }

    public function editGroup(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'id' => 'required|exists:groups,id',
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:7', // Suponiendo que el color es un código hexadecimal
        ]);

        // Buscar el grupo por ID
        $group = Group::find($validatedData['id']);

        // Verificar si el grupo fue encontrado
        if (!$group) {
            return response()->json(['error' => 'Grupo no encontrado.'], 404);
        }

        // Actualizar el grupo con los datos validados
        $group->name = $validatedData['name'];
        $group->color = $validatedData['color'];
        $group->save();

        // Devolver una respuesta JSON con el grupo actualizado
        return response()->json(['data' => $group], 200);
    }

    public function createGroup(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:7', // Suponiendo que el color es un código hexadecimal
        ]);

        // Crear grupo
        $group = Group::create([
            'name' =>       $validatedData['name'],
            'color' =>      $validatedData['color'],
            'user_id' =>    $request->user()->id,
        ]);

        // Devolver una respuesta JSON con el grupo actualizado
        return response()->json(['data' => $group], 200);
    }
}
