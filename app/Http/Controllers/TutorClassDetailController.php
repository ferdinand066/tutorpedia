<?php

namespace App\Http\Controllers;

use App\Models\TutorClassDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TutorClassDetailController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
            'tutor_class_id' => 'exists:tutor_classes,id'
        ]);

        TutorClassDetail::create([
            'tutor_class_id' => $validated['tutor_class_id'],
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TutorClassDetail  $tutorClassDetail
     * @return \Illuminate\Http\Response
     */
    public function show(TutorClassDetail $tutorClassDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TutorClassDetail  $tutorClassDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(TutorClassDetail $tutorClassDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TutorClassDetail  $tutorClassDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TutorClassDetail $tutorClassDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TutorClassDetail  $tutorClassDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(TutorClassDetail $tutorClassDetail)
    {
        //
    }
}
