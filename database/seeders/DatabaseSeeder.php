<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Chapter;
use App\Models\Curso;
use App\Models\Lesson;
use App\Models\Statement;
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
        $this->call([
            UsersTableSeeder::class,
            TracksTableSeeder::class,
            CursosTableSeeder::class,
            ChaptersTableSeeder::class,
            GroupsTableSeeder::class,
            //GroupUserSeeder::class,
            LessonsTableSeeder::class,
            QuestionsTableSeeder::class,
            WorkshopsTableSeeder::class,
            LawsTableSeeder::class,
            LawWorkshopSeeder::class,
            EntryTableSeeder::class,
            StatementsTableSeeder::class,
            FieldsTableSeeder::class,
            WorkshopEntriesTableSeeder::class,
            //PucsTableSeeder::class
        ]);
    }
}
