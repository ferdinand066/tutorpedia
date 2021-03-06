<?php

namespace App\Http\Controllers;

use App\Models\TutorClass;
use App\Models\TutorClassDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LearnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = $this->get_classes(">=");
        
        $top_classes = $query->limit(4)->get();
        $classes = $query->paginate(10);

        return view('learning.index', compact(['top_classes', 'classes']));
    }


    public function completed(){
        $query = $this->get_classes("<");
        
        $classes = $query->paginate(10);
        return view('learning.completed', compact(['classes']));
    }

    public function get_classes($date){
        $list = TutorClassDetail::where([['user_id', Auth::user()->id], ['status', '=', 1]])->pluck('tutor_class_id')->toArray();

        $query = TutorClass::whereIn('id', $list)->where([['date', $date, date('Y-m-d')], ['status', '=', 1]])->orderBy('date');
        
        return $query;
    }
}
