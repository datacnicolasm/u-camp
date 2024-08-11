<?php

namespace Database\Seeders;

use App\Models\Puc;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class PucsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ruta al archivo JSON
        $jsonPath = database_path('data/pucs.json');

        // Leer el contenido del archivo JSON
        if (File::exists($jsonPath)) {
            $json = File::get($jsonPath);
            $items = json_decode($json, true);

            // Crear instancias de RutaProfesional a partir de los datos JSON
            foreach ($items as $item) {
                Puc::create([
                    'grupo_1' => $item['grupo_1'],
                    'grupo_2' => $item['grupo_2'],
                    'grupo_3' => $item['grupo_3'],
                    'codigo_cuenta' => $item['codigo_cuenta'],
                    'nombre_cuenta' => $item['nombre_cuenta'],
                ]);
            }
        } else {
            $this->command->error("File not found: " . $jsonPath);
        }
    }
}
