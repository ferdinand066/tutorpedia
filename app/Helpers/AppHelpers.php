<?php

use App\Models\Follower;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

if(!function_exists('canSubscribe')){
    function canSubscribe($id){
        if ($id == Auth::user()->id) return false;
        return count(Follower::where([['tutor_id', $id], ['student_id', Auth::user()->id]])->get()) > 0 ? false : true;
    }
}

if(!function_exists('updateUserBalance')){
    function updateUserBalance(User $user, $balance){
        if ($user->balance + $balance < 0) return false;
        $new_balance = $user->balance + $balance;
        User::where('id', $user->id)->update([
            'balance' => $new_balance
        ]);
        return true;
    }
}



