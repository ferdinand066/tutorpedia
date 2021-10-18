<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $classes = TutorClass::where([['status', '=', 1], ['date', '>=', date('Y-m-d')]])->orderBy('date')->paginate(10);
        return view('admin.class.index', compact(['classes']));
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
    public function show(TutorClass $tutorClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TutorClass  $tutorClass
     * @return \Illuminate\Http\Response
     */
    public function edit(TutorClass $tutorClass)
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
    public function update(Request $request, TutorClass $class)
    {
        $class->update([
            'status' => 1
        ]);
        return redirect()->back();
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

    public function pending(){
        $classes = TutorClass::where([['status', '=', 0], ['date', '>=', date('Y-m-d')]])->orderBy('date')->paginate(10);
        return view('admin.class.pending', compact(['classes']));
    }
}
