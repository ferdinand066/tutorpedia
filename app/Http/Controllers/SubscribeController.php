<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tutor_id' => 'exists:users,id'
        ]);

        Follower::create([
            'tutor_id' => $validated['tutor_id'],
            'student_id' => Auth::user()->id
        ]);

        return redirect()->back();
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Follower  $follower
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $subscribe)
    {
        Follower::where([['tutor_id', $subscribe->id], ['student_id', Auth::user()->id]])->delete();

        return redirect()->back();
    }
}
