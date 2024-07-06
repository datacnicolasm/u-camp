<?php

namespace Database\Seeders;

use App\Models\Chapter;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ChaptersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ruta al archivo JSON
        $jsonPath = database_path('data/chapters.json');

        // Leer el contenido del archivo JSON
        if (File::exists($jsonPath)) {
            $json = File::get($jsonPath);
            $chapters = json_decode($json, true);

            // Crear instancias de RutaProfesional a partir de los datos JSON
            foreach ($chapters as $chapter) {
                Chapter::create([
                    'title' =>          $chapter['title'],
                    'description' =>    $chapter['description'],
                    'curso_id' =>       1
                ]);
            }
        } else {
            $this->command->error("File not found: " . $jsonPath);
        }
    }
}
