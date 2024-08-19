<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ruta al archivo JSON
        $jsonPath = database_path('data/users.json');

        // Leer el contenido del archivo JSON
        if (File::exists($jsonPath)) {
            $json = File::get($jsonPath);
            $users = json_decode($json, true);

            // Crear instancias de RutaProfesional a partir de los datos JSON
            foreach ($users as $user) {
                User::create([
                    'first_name' =>     $user['first_name'],
                    'last_name' =>      $user['last_name'],
                    'email' =>          $user['email'],
                    'password' =>       bcrypt('password147'),
                    'has_groups' =>          $user['has_groups']
                ]);
            }
        } else {
            $this->command->error("File not found: " . $jsonPath);
        }
    }
}
