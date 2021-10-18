<?php

namespace Database\Seeders;

use App\Models\TutorClass;
use App\Models\TutorClassDetail;
use App\Models\User;
use Illuminate\Database\Seeder;

class TutorClassDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tutor_classes = TutorClass::where('status', '=', 1)->get();

        foreach($tutor_classes as $class){
            $user_list = User::where('id', '!=', $class->user_id)->pluck('id')->toArray();
            foreach(range($class->minimum_person, $class->maximum_person) as $i){
                $random = random_int(0, count($user_list) - 1);
                $random_int = random_int(0, 20);
                $random_int = ($random_int > 5) ? 1 : 0;
                $user_id = $user_list[$random];
                TutorClassDetail::create([
                    'user_id' => $user_id,
                    'tutor_class_id' => $class->id,
                    'status' => $random_int
                ]);

                array_splice($user_list, $random, 1);

            }
        }

    }
}
