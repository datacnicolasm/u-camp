<?php

namespace Database\Seeders;

use App\Models\Law;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class LawsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ruta al archivo JSON
        $jsonPath = database_path('data/laws.json');

        // Leer el contenido del archivo JSON
        if (File::exists($jsonPath)) {
            $json = File::get($jsonPath);
            $items = json_decode($json, true);

            // Crear instancias de RutaProfesional a partir de los datos JSON
            foreach ($items as $item) {
                Law::create([
                    'year_law' => $item['year_law'],
                    'num_law' => $item['num_law'],
                    'title_law' => $item['title_law'],
                    'type_law' => $item['type_law'],
                    'text_law' => $item['text_law']
                ]);
            }
        } else {
            $this->command->error("File not found: " . $jsonPath);
        }
    }
}
