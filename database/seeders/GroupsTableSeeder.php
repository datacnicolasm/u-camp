<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ruta al archivo JSON
        $jsonPath = database_path('data/groups.json');

        // Leer el contenido del archivo JSON
        if (File::exists($jsonPath)) {
            $json = File::get($jsonPath);
            $groups = json_decode($json, true);

            // Crear instancias de RutaProfesional a partir de los datos JSON
            foreach ($groups as $group) {
                Group::create([
                    'name' =>       $group['name'],
                    'color' =>      $group['color'],
                    'user_id' =>    $group['user_id'],
                ]);
            }
        } else {
            $this->command->error("File not found: " . $jsonPath);
        }
    }
}
