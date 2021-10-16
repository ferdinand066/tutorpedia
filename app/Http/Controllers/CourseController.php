<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Major;
use App\Models\TutorClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $validated = $request->validate([
            'major_id' => 'nullable|exists:majors,id',
            'course_id' => 'nullable|exists:courses,id',
            'search' => 'nullable|string'
        ]);

        $callback = ['tutor_classes' => function($query){
                        return $query->where('date', '>=', date('Y-m-d'))->orderBy('date');
                    }];
        if(isset($validated['major_id']) && isset($validated['course_id'])){
            $course = Course::with($callback)->find($validated['course_id']);
            $tutor_classes = $course->tutor_classes()->paginate(12);
            return view('courses.show', compact(['tutor_classes', 'course']));
        
        } else if (isset($validated['major_id']) && !isset($validated['course_id'])){
            $tutor_classes = TutorClass::whereHas('course', function($query) use ($validated){
                return $query->where('major_id', $validated['major_id']);
            })->where('date', '>=', date('Y-m-d'))->orderBy('date')->paginate(12);
            $major = Major::find($validated['major_id']);
            return view('courses.show', compact(['tutor_classes', 'major']));
        
        } else if (isset($validated['search'])){
            $tutor_classes = TutorClass::where([
                ['name', 'like', '%' . $validated['search'] . '%'],
                ['date', '>=', date('Y-m-d')]
            ])->orderBy('date')->paginate(12);
            return view('courses.show', compact(['tutor_classes']));
        } else {
            if(!str_ends_with(URL::full(), 'course')){
                return redirect()->route('home');
            }
            return view('courses.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }

    public function data(Request $request){
        $validated = $request->validate([
            'major_id' => 'exists:majors,id'
        ]);

        $courses = Course::where([['major_id', $validated['major_id']], ['name', '!=', 'Other']])->orderBy('name')->get();
        $other = Course::where([['major_id', $validated['major_id']], ['name', '=', 'Other']])->orderBy('name')->get();

        return response()->json([$courses, $other]);
    }
}
