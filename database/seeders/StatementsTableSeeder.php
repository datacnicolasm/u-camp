<?php

namespace Database\Seeders;

use App\Models\Statement;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class StatementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ruta al archivo JSON
        $jsonPath = database_path('data/statements.json');

        // Leer el contenido del archivo JSON
        if (File::exists($jsonPath)) {
            $json = File::get($jsonPath);
            $items = json_decode($json, true);

            // Crear instancias de RutaProfesional a partir de los datos JSON
            foreach ($items as $item) {
                Statement::create([
                    'value' => $item['value'],
                    'entry_id' => $item['entry_id'],
                    'workshop_id' => $item['workshop_id']
                ]);
            }
        } else {
            $this->command->error("File not found: " . $jsonPath);
        }
    }
}