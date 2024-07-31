<?php

namespace Database\Seeders;

use App\Models\WorkshopEntry;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class WorkshopEntriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ruta al archivo JSON
        $jsonPath = database_path('data/workshops_entries.json');

        // Leer el contenido del archivo JSON
        if (File::exists($jsonPath)) {
            $json = File::get($jsonPath);
            $items = json_decode($json, true);

            // Crear instancias de RutaProfesional a partir de los datos JSON
            foreach ($items as $item) {
                WorkshopEntry::create([
                    'value_input' => $item['value_input'],
                    'cod_input' => $item['cod_input'],
                    'workshop_id' => $item['workshop_id']
                ]);
            }
        } else {
            $this->command->error("File not found: " . $jsonPath);
        }
    }
}
