<?php

namespace Database\Seeders;

use App\Models\Curso;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CursosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ruta al archivo JSON
        $jsonPath = database_path('data/cursos.json');

        // Leer el contenido del archivo JSON
        if (File::exists($jsonPath)) {
            $json = File::get($jsonPath);
            $cursos = json_decode($json, true);

            // Crear instancias de RutaProfesional a partir de los datos JSON
            foreach ($cursos as $curso) {
                Curso::create([
                    'titulo' =>                 $curso['titulo'],
                    'short_description' =>      $curso['short_description'],
                    'long_description' =>       $curso['long_description'],
                    'ruta_profesional_id' =>    1
                ]);
            }
        } else {
            $this->command->error("File not found: " . $jsonPath);
        }
    }
}
