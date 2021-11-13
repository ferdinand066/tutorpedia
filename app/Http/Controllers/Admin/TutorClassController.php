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
        return redirect()->back()->with('success', 'Successfully approved the creation of class ' . $class->name);
    }

    public function pending(){
        $classes = TutorClass::where([['status', '=', 0], ['date', '>=', date('Y-m-d')]])->orderBy('date')->paginate(10);
        return view('admin.class.pending', compact(['classes']));
    }
}
