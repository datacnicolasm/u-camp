<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class LessonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ruta al archivo JSON
        $jsonPath = database_path('data/lessons.json');

        // Leer el contenido del archivo JSON
        if (File::exists($jsonPath)) {
            $json = File::get($jsonPath);
            $lessons = json_decode($json, true);

            // Crear instancias de RutaProfesional a partir de los datos JSON
            foreach ($lessons as $lesson) {
                Lesson::create([
                    'title' =>          $lesson['title'],
                    'type' =>           $lesson['type'],
                    'points_xp' =>      $lesson['points_xp'],
                    'chapter_id' =>     $lesson['chapter_id']
                ]);
            }
        } else {
            $this->command->error("File not found: " . $jsonPath);
        }
    }
}
