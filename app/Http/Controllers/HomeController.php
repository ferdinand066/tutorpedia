<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\TutorClass;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $majors = Major::orderBy('name')->get();
        $data = [];

        foreach($majors as $major){
            $tutor_classes = TutorClass::limit(6)->whereHas('course', function ($query) use ($major) {
                $query->where('major_id','=', $major->id);
            })->orderBy('date')->get();
            $data[$major->id] = $tutor_classes;
        }
        return view('home', compact(['data']));
    }
}
