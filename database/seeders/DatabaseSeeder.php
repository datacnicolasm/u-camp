<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Curso;
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

        // Crear cursos
        Curso::create([
            'titulo' => 'Introducción de Impuesto de renta',
            'descripcion' => 'Curso fundamental para comprender el impuesto de renta en Colombia, con ejercicios prácticos sobre su cálculo y liquidación.'
        ]);

        Curso::create([
            'titulo' => 'Profundizando en el Impuesto de renta',
            'descripcion' => 'Aprende sobre la regulación del impuesto de renta en Colombia y la clasificación de los contribuyentes de este impuesto.'
        ]);

        Curso::create([
            'titulo' => 'Impuesto de renta para personas Juridicas',
            'descripcion' => 'Eleva tu nivel de conocimiento y aprende a liquidar este impuesto para personas jurídicas, mediante ejercicios prácticos.'
        ]);
    }
}
