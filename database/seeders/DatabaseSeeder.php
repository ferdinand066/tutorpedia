<?php

namespace Database\Seeders;

use App\Models\University;
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
            UniversitySeeder::class,
            MajorSeeder::class,
            CourseSeeder::class,
            
        ]);

        University::create([
            'name' => 'Others'
        ]);

        \App\Models\User::factory(10)->create();

        $this->call([
            TutorClassSeeder::class
        ]);
    }
}
