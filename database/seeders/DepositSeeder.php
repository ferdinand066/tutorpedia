<?php

namespace Database\Seeders;

use App\Models\Deposit;
use App\Models\User;
use Illuminate\Database\Seeder;

class DepositSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::where('role', 'Member')->get();
        $admins = User::where('role', 'Admin')->get();

        foreach($users as $user){
            $balance = random_int(1, 300) * 1000;
            $status = random_int(0, 2);

            $data = [];

            if ($status == 2){
                $data['status'] = null;
                $data['admin_id'] = null;
            } else {
                $data['status'] = $status;
                $data['admin_id'] = $admins[random_int(0, count($admins) - 1)]->id;
            }

            $data['user_id'] = $user->id;
            $data['balance'] = $balance;

            Deposit::create($data);
        }

    }
}
