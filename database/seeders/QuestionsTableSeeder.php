<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ruta al archivo JSON
        $jsonPath = database_path('data/questions.json');

        // Leer el contenido del archivo JSON
        if (File::exists($jsonPath)) {
            $json = File::get($jsonPath);
            $questions = json_decode($json, true);

            // Crear instancias de RutaProfesional a partir de los datos JSON
            foreach ($questions as $question) {
                Question::create([
                    'text_question' =>      $question['text_question'],
                    'file_slide' =>         $question['file_slide'],
                    'option_1' =>           $question['option_1'],
                    'option_2' =>           $question['option_2'],
                    'option_3' =>           $question['option_3'],
                    'option_4' =>           $question['option_4'],
                    'correct_option' =>     $question['correct_option'],
                    'lesson_id' =>          $question['lesson_id']
                ]);
            }
        } else {
            $this->command->error("File not found: " . $jsonPath);
        }
    }
}
