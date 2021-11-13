<?php

namespace Database\Seeders;

use App\Models\Follower;
use App\Models\User;
use Illuminate\Database\Seeder;

class FollowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        foreach($users as $user){
            $list_user = User::where('id', '!=', $user->id)
                ->inRandomOrder()
                ->limit(random_int(3, 10))
                ->pluck('id')
                ->toArray();
            
            foreach($list_user as $lists){
                Follower::create([
                    'tutor_id' => $user->id,
                    'student_id' => $lists
                ]);
            }
        }
    }
}
