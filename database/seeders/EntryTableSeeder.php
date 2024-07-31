<?php

namespace Database\Seeders;

use App\Models\Entry;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class EntryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ruta al archivo JSON
        $jsonPath = database_path('data/entris.json');

        // Leer el contenido del archivo JSON
        if (File::exists($jsonPath)) {
            $json = File::get($jsonPath);
            $items = json_decode($json, true);

            // Crear instancias de RutaProfesional a partir de los datos JSON
            foreach ($items as $item) {
                Entry::create([
                    'type_eeff' => $item['type_eeff'],
                    'type_group' => $item['type_group'],
                    'sub_type_group' => isset($item['sub_type_group']) ? $item['sub_type_group'] : "",
                    'name_es' => $item['name_es'],
                    'name_en' => $item['name_en']
                ]);
            }
        } else {
            $this->command->error("File not found: " . $jsonPath);
        }
    }
}
