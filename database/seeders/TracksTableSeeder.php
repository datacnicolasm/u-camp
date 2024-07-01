<?php

namespace Database\Seeders;

use App\Models\RutaProfesional;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class TracksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ruta al archivo JSON
        $jsonPath = database_path('data/tracks.json');

        // Leer el contenido del archivo JSON
        if (File::exists($jsonPath)) {
            $json = File::get($jsonPath);
            $tracks = json_decode($json, true);

            // Crear instancias de RutaProfesional a partir de los datos JSON
            foreach ($tracks as $track) {
                RutaProfesional::create([
                    'title' => $track['title'],
                    'short_description' => $track['short_description'],
                    'long_description' => $track['long_description'],
                ]);
            }
        } else {
            $this->command->error("File not found: " . $jsonPath);
        }
    }
}
