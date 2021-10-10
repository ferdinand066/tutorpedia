<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Major;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $majors = Major::all();
        foreach($majors as $major){
            foreach(range(1, random_int(2, 8)) as $i){
                Course::create([
                    'name' => $faker->text(10),
                    'major_id' => $major->id
                ]);
            }
            Course::create([
                'name' => 'Other',
                'major_id' => $major->id
            ]);
        }
    }
}
