<?php

namespace Database\Seeders;

use App\Models\TutorClassDetail;
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

        \App\Models\User::factory(100)->create();

        $this->call([
            TutorClassSeeder::class,
            TutorClassDetailSeeder::class,
            FollowerSeeder::class,
            ClassRejectReasonSeeder::class
        ]);
    }
}
