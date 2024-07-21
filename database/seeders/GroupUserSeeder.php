<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Seeder;

class GroupUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Obtener todos los usuarios y grupos
        $users = User::all();
        $groups = Group::all();

        // Iterar sobre cada grupo y asignar usuarios aleatoriamente
        foreach ($groups as $group) {
            // Seleccionar un número aleatorio de usuarios para asignar al grupo
            $randomUsers = $users->random(rand(2, $users->count()))->pluck('id');

            // Asignar los usuarios al grupo
            $group->users()->attach($randomUsers);
        }
    }
}
