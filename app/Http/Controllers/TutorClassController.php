<?php

namespace App\Http\Controllers;

use App\Models\TutorClass;
use Illuminate\Http\Request;

class TutorClassController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TutorClass  $tutorClass
     * @return \Illuminate\Http\Response
     */
    public function show(TutorClass $class)
    {
        $recommendations = TutorClass::inRandomOrder()
            ->limit(2)
            ->where([['course_id', $class->course_id], ['id', '!=', $class->id]])
            ->get();
        return view('tutor.show', compact(['class', 'recommendations']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TutorClass  $tutorClass
     * @return \Illuminate\Http\Response
     */
    public function edit(TutorClass $tutor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TutorClass  $tutorClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TutorClass $tutorClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TutorClass  $tutorClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(TutorClass $tutorClass)
    {
        //
    }
}
