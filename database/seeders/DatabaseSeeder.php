<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Chapter;
use App\Models\Curso;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Crear usuarios
        $this->call([
            UsersTableSeeder::class,
        ]);

        // Crear rutas
        $this->call([
            TracksTableSeeder::class,
        ]);

        // Crear cursos
        $this->call([
            CursosTableSeeder::class,
        ]);

        // Crear capitulos
        $this->call([
            ChaptersTableSeeder::class,
        ]);

        // Crear lecciones
        $this->call([
            LessonsTableSeeder::class,
        ]);

        // Crear prefuntas de cuestionario
        $this->call([
            QuestionsTableSeeder::class,
        ]);

        
    }
}
