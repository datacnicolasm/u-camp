<?php

namespace Database\Seeders;

use App\Models\Field;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class FieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ruta al archivo JSON
        $jsonPath = database_path('data/fields.json');

        // Leer el contenido del archivo JSON
        if (File::exists($jsonPath)) {
            $json = File::get($jsonPath);
            $items = json_decode($json, true);

            // Crear instancias de RutaProfesional a partir de los datos JSON
            foreach ($items as $item) {
                Field::create([
                    'cod_form' => $item['cod_form'],
                    'cod_field' => $item['cod_field'],
                    'value' => $item['value'],
                    'workshop_id' => $item['workshop_id']
                ]);
            }
        } else {
            $this->command->error("File not found: " . $jsonPath);
        }
    }
}
