<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class LawWorkshopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ruta al archivo JSON
        $jsonPath = database_path('data/law_workshop.json');

        // Leer el contenido del archivo JSON
        $json = File::get($jsonPath);

        // Decodificar el JSON en un array asociativo
        $data = json_decode($json, true);

        // Agregar timestamps si no están en el JSON
        $timestamp = Carbon::now()->toDateTimeString();
        foreach ($data as &$record) {
            $record['created_at'] = $record['created_at'] ?? $timestamp;
            $record['updated_at'] = $record['updated_at'] ?? $timestamp;
        }

        // Insertar los datos en la tabla pivote
        DB::table('law_workshop')->insert($data);
    }
}
