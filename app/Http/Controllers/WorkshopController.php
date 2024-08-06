<?php

namespace App\Http\Controllers;

use App\Models\Workshop;
use App\Models\WorkshopEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class WorkshopController extends Controller
{
    public function calificarWorkshop(Request $request, Workshop $workshop)
    {
        $matriz_verificacion = array();

        // Acceder a la entrada 'entries_workshop' como un array
        $entries_workshop = $request->input('entries_workshop', []);

        foreach ($entries_workshop as $entry) {

            $verify_input = true;

            // Buscar el elemento en WorkshopEntry
            $workshopEntry = WorkshopEntry::where('cod_input', $entry['name'])
                ->where('workshop_id', $workshop->id)
                ->first();

            //Log::info($workshopEntry);

            // Si no se encuentra el WorkshopEntry o los valores no coinciden, marcar como no verificado
            if (!$workshopEntry || intval($entry['val']) !== $workshopEntry->value_input) {
                $verify_input = false;
            }

            $matriz_verificacion[] = [
                'cod_input' => $entry['name'],
                'name_section' => $entry['name_section'],
                'val_input' => intval($entry['val']),
                'verify' => $verify_input
            ];
        }

        return response()->json([
            'data' => [
                'matriz' => $matriz_verificacion
            ]
        ]);
    }
}
