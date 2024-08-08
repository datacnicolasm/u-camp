<?php

namespace App\Http\Controllers;

use App\Models\Point;
use App\Models\UserWorkshop;
use App\Models\UserWorkshopEntry;
use App\Models\Workshop;
use App\Models\WorkshopEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class WorkshopController extends Controller
{
    public function calificarWorkshop(Request $request, Workshop $workshop)
    {
        $matriz_verificacion = array();
        $int_errores = 0;
        $int_aciertos = 0;
        $int_null = 0;

        // Usuario de la solicitud
        $user = $request->user();

        // Crear el userworkshop
        $userWorkshop = new UserWorkshop();
        $userWorkshop->int_errores = $int_errores;
        $userWorkshop->int_aciertos = $int_aciertos;
        $userWorkshop->int_null = $int_null;
        $userWorkshop->user_id = $user->id;
        $userWorkshop->workshop_id = $workshop->id;
        $userWorkshop->save();

        $userWorkshop->load('workshop.lesson');

        // Acceder a la entrada 'entries_workshop' como un array
        $entries_workshop = $request->input('entries_workshop', []);

        foreach ($entries_workshop as $entry) {

            $verify_input = "acierto";

            // Buscar el elemento en WorkshopEntry
            $workshopEntry = WorkshopEntry::where('cod_input', $entry['name'])
                ->where('workshop_id', $workshop->id)
                ->first();


            // Si no se encuentra el WorkshopEntry o los valores no coinciden, marcar como no verificado
            if (!$workshopEntry || intval($entry['val']) !== $workshopEntry->value_input) {
                
                $verify_input = "error";
                $int_errores += 1;

                $userWorkshopEntry = new UserWorkshopEntry();
                $userWorkshopEntry->value_input = intval($entry['val']);
                $userWorkshopEntry->cod_input = $entry['name'];
                $userWorkshopEntry->verify_value = $verify_input;
                $userWorkshopEntry->userworkshop_id = $userWorkshop->id;
                $userWorkshopEntry->save();

            }elseif( intval($entry['val']) == 0 && $workshopEntry->value_input == 0){
                $verify_input = "no-calificable";
                $int_null += 1;
            }else{
                $int_aciertos += 1;

                $userWorkshopEntry = new UserWorkshopEntry();
                $userWorkshopEntry->value_input = intval($entry['val']);
                $userWorkshopEntry->cod_input = $entry['name'];
                $userWorkshopEntry->verify_value = $verify_input;
                $userWorkshopEntry->userworkshop_id = $userWorkshop->id;
                $userWorkshopEntry->save();
            }

            $matriz_verificacion[] = [
                'cod_input' => $entry['name'],
                'name_section' => $entry['name_section'],
                'val_input' => intval($entry['val']),
                'verify' => $verify_input
            ];
        }

        $aprobado = ( $int_aciertos / ($int_errores + $int_aciertos)) > 0.7 ? true : false;

        if ( $aprobado ) {
            // Registrar la lección vista
            $user->lessons()->syncWithoutDetaching([$userWorkshop->workshop->lesson->id]);

            // Cuando un usuario completa una lección, se debe registrar en el modelo Point.
            Point::completeLesson($user, $userWorkshop->workshop->lesson, 'dian');
        }

        // Modificar el userworkshop
        $userWorkshop->int_errores = $int_errores;
        $userWorkshop->int_aciertos = $int_aciertos;
        $userWorkshop->int_null = $int_null;
        $userWorkshop->save();

        return response()->json([
            'data' => [
                'matriz' => $matriz_verificacion,
                'userWorkshop' => $userWorkshop
            ]
        ]);
    }
}
