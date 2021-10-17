<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Major;
use App\Models\TutorClass;
use App\Models\TutorClassDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Gate};

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
        return view('teach.create');
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
            'link' => 'required|active_url',
            'name' => 'required',
            'major_id' => 'exists:majors,id',
            'course_id' => 'exists:courses,id',
            'price' => 'required|integer|regex:/^[1-9]+[0-9]*000$/',
            'date' => 'required|date_format:Y-m-d|after:' . date('Y-m-d'),
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'minimum_person' => 'required|integer',
            'maximum_person' => 'required|integer|gt:minimum_person',
            'description' => 'required|string',
            'requirement' => 'required|array|min:1',
            'requirement.*' => 'required|string|distinct',
        ]);
        $requirement = json_encode($validated['requirement']);
        $validated['requirement'] = $requirement;
        $validated['user_id'] = Auth::user()->id;
        unset($validated['major_id']);

        TutorClass::create($validated);
        return redirect()->route('teach.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TutorClass  $tutorClass
     * @return \Illuminate\Http\Response
     */
    public function show(TutorClass $class)
    {
        if(($class->status == 0 && !Gate::allows('manage-data') && !Gate::allows('update-self-data', $class))){
            return abort(404);
        }

        $can_buy = false;
        $recommendations = TutorClass::inRandomOrder()
            ->limit(2)
            ->where([['course_id', $class->course_id], ['id', '!=', $class->id]])
            ->get();
        
        $tutorClassDetail = TutorClassDetail::where([['tutor_class_id', $class->id], 
            ['user_id', Auth::user()->id]])->get();
        
        if (count($tutorClassDetail) === 0 && $class->user->id !== Auth::user()->id){
            $can_buy = true;
        }

        $class = TutorClass::with(['class_reject_reasons' => function($query){
            return $query->orderBy('created_at');
        }])->find($class->id);



        return view('tutor.show', compact(['class', 'recommendations', 'can_buy']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TutorClass  $tutorClass
     * @return \Illuminate\Http\Response
     */
    public function edit(TutorClass $class)
    {
        if(($class->status == 1 || (!Gate::allows('manage-data') && !Gate::allows('update-self-data', $class)))){
            return abort(404);
        }

        $courses = Course::where('major_id', $class->course->major_id)->get();

        return view('teach.edit', compact(['class', 'courses']));
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
