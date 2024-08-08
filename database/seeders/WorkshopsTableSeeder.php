<?php

namespace Database\Seeders;

use App\Models\Workshop;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class WorkshopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ruta al archivo JSON
        $jsonPath = database_path('data/workshops.json');

        // Leer el contenido del archivo JSON
        if (File::exists($jsonPath)) {
            $json = File::get($jsonPath);
            $workshops = json_decode($json, true);

            // Crear instancias de RutaProfesional a partir de los datos JSON
            foreach ($workshops as $item) {
                Workshop::create([
                    'context_workshop' => $item['context_workshop'],
                    'indicaciones_workshop' => $item['indicaciones_workshop'],
                    'cod_form' => $item['cod_form'],
                    'text_form' => $item['text_form'],
                    'year_form' => $item['year_form'],
                    'lesson_id' => $item['lesson_id']
                ]);
            }
        } else {
            $this->command->error("File not found: " . $jsonPath);
        }
    }
}
