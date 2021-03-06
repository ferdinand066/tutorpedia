<?php

use App\Models\Follower;
use App\Models\Rating;
use App\Models\TutorClass;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

if(!function_exists('getPicture')){
    function getPicture($folder, $file){
        if (Storage::exists('public/' . $folder . '/' . $file)) return Storage::url('public/' . $folder . '/' . $file);
        return $file;
    }
}

if(!function_exists('getRating')){
    function getRating(User $user){
        $list = TutorClass::where('user_id', $user->id)->pluck('id')->toArray();
        $rating = Rating::whereIn('tutor_class_id', $list)->pluck('rating')->toArray();
        return array(count($rating) > 0 ? round(array_sum($rating) / count($rating), 2) : 'N/A', count($rating));

    }
}


