<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\TutorClass;
use App\Models\User;
use Illuminate\Database\Seeder;

class TutorClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = Course::all();
        $faker = \Faker\Factory::create();

        foreach($courses as $course){
            foreach(range(1,random_int(2, 5)) as $i){
                $minimum_person = random_int(1, 10);
                TutorClass::create([
                    'course_id' => $course->id,
                    'name' => $faker->text(50),
                    'user_id' => User::inRandomOrder()->first()->id,
                    'date' => $faker->dateTimeBetween('+2 weeks', '+2 months'),
                    'start_time' => $faker->time(),
                    'end_time' => $faker->time(),
                    'minimum_person' => $minimum_person,
                    'maximum_person' => $minimum_person + random_int(1, 10),
                    'price' => $faker->numberBetween(200, 20000) * 100
                ]);
            }
        }
    }
}
