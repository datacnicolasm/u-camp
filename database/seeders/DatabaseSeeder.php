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
        User::factory(10)->create();

        // Crear rutas
        $this->call([
            TracksTableSeeder::class,
        ]);

        // Crear cursos
        Curso::create([
            'titulo' => 'Introducción de Impuesto de renta',
            'short_description' => 'Curso fundamental para comprender el impuesto de renta en Colombia, con ejercicios prácticos sobre su cálculo y liquidación.',
            'long_description' => 'Curso fundamental para comprender el impuesto de renta en Colombia, con ejercicios prácticos sobre su cálculo y liquidación.',
            'ruta_profesional_id' => 1
        ]);

        Chapter::create([
            'title' => 'Capitulo de prueba 1',
            'description' => 'Descripcion de capitulo de prueba 1',
            'curso_id' => 1
        ]);

        Chapter::create([
            'title' => 'Capitulo de prueba 2',
            'description' => 'Descripcion de capitulo de prueba 2',
            'curso_id' => 1
        ]);

        Chapter::create([
            'title' => 'Capitulo de prueba 2',
            'description' => 'Descripcion de capitulo de prueba 2',
            'curso_id' => 1
        ]);

        Chapter::create([
            'title' => 'Capitulo de prueba 2',
            'description' => 'Descripcion de capitulo de prueba 2',
            'curso_id' => 1
        ]);

        Lesson::create([
            'title' => 'Lesson de prueba 1',
            'type' => 'video',
            'points_xp' => 50,
            'chapter_id' => 1
        ]);

        Lesson::create([
            'title' => 'Lesson de prueba 2',
            'type' => 'video',
            'points_xp' => 50,
            'chapter_id' => 1
        ]);

        Lesson::create([
            'title' => 'Lesson de prueba 3',
            'type' => 'video',
            'points_xp' => 50,
            'chapter_id' => 2
        ]);

        Lesson::create([
            'title' => 'Lesson de prueba 4',
            'type' => 'video',
            'points_xp' => 50,
            'chapter_id' => 2
        ]);

        Lesson::create([
            'title' => 'Lesson de prueba 5',
            'type' => 'video',
            'points_xp' => 50,
            'chapter_id' => 3
        ]);

        Lesson::create([
            'title' => 'Lesson de prueba 6',
            'type' => 'video',
            'points_xp' => 50,
            'chapter_id' => 3
        ]);

        Lesson::create([
            'title' => 'Lesson de prueba 7',
            'type' => 'video',
            'points_xp' => 50,
            'chapter_id' => 4
        ]);

        Lesson::create([
            'title' => 'Lesson de prueba 8',
            'type' => 'video',
            'points_xp' => 50,
            'chapter_id' => 4
        ]);

        Curso::create([
            'titulo' => 'Profundizando en el Impuesto de renta',
            'short_description' => 'Aprende sobre la regulación del impuesto de renta en Colombia y la clasificación de los contribuyentes de este impuesto.',
            'long_description' => 'Aprende sobre la regulación del impuesto de renta en Colombia y la clasificación de los contribuyentes de este impuesto.',
            'ruta_profesional_id' => 1
        ]);

        Curso::create([
            'titulo' => 'Impuesto de renta para personas Juridicas',
            'short_description' => 'Eleva tu nivel de conocimiento y aprende a liquidar este impuesto para personas jurídicas, mediante ejercicios prácticos.',
            'long_description' => 'Eleva tu nivel de conocimiento y aprende a liquidar este impuesto para personas jurídicas, mediante ejercicios prácticos.',
            'ruta_profesional_id' => 1
        ]);
    }
}
