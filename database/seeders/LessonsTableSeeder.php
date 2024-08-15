<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Carbon\Carbon;
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

        // Verificar si el archivo existe
        if (File::exists($jsonPath)) {
            // Leer el contenido del archivo JSON
            $json = File::get($jsonPath);
            $lessons = json_decode($json, true);

            // Verificar si la decodificación fue exitosa
            if ($lessons !== null) {
                // Crear instancias de Lesson a partir de los datos JSON
                foreach ($lessons as $lesson) {
                    Lesson::create([
                        'activo' => $lesson['activo'] ?? true,
                        'title' => $lesson['title'],
                        'type' => $lesson['type'],
                        'use_type' => $lesson['use_type'],
                        'points_xp' => $lesson['points_xp'],
                        'order' => $lesson['order'],
                        'group_id' => $lesson['group_id'] ?? null,
                        'user_id' => $lesson['user_id'] ?? null,
                        'chapter_id' => $lesson['chapter_id'] ?? null,
                        'is_archived' => $lesson['is_archived'] ?? false,
                        'expires_at' => isset($lesson['expires_at']) ? Carbon::parse($lesson['expires_at']) : null,
                    ]);
                }
            } else {
                $this->command->error("Error decoding JSON from file: " . $jsonPath);
            }
        } else {
            $this->command->error("File not found: " . $jsonPath);
        }
    }
}
