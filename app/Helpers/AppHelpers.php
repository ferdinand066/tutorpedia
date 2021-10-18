<?php

use App\Models\Follower;
use Illuminate\Support\Facades\Auth;

if(!function_exists('canSubscribe')){
    function canSubscribe($id){
        if ($id == Auth::user()->id) return false;
        return count(Follower::where([['tutor_id', $id], ['student_id', Auth::user()->id]])->get()) > 0 ? false : true;
    }
}



