<?php

namespace Database\Seeders;

use App\Models\ClassRejectReason;
use App\Models\TutorClass;
use App\Models\User;
use Illuminate\Database\Seeder;

class ClassRejectReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tutor_classes = TutorClass::where('status', '=', 0)->get();
        $user_list = User::where('role', '=', 'Admin')->pluck('id')->toArray();
        $faker = \Faker\Factory::create();
        foreach($tutor_classes as $class){
            $random_int = random_int(1, 5);
            foreach(range(0, $random_int) as $i){
                ClassRejectReason::create([
                    'tutor_class_id' => $class->id,
                    'description' => $faker->realTextBetween(5, 20),
                    'user_id' => $user_list[random_int(0, count($user_list) - 1)]
                ]);
            }
        }

    }
}
