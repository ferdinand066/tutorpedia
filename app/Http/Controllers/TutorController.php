<?php

namespace App\Http\Controllers;

use App\Models\TutorClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $top_classes = TutorClass::where([
            ['user_id', Auth::user()->id],
            ['status', '=', 1],
            ['date', '>=', date('Y-m-d')]
        ])->limit(4)->get();
        $classes = $this->get_classes(1, ">=");
        return view('teach.index', compact(['classes', 'top_classes']));
    }

    public function pending(){
        $classes = $this->get_classes(0, ">=");
        return view('teach.pending', compact(['classes']));
    }

    public function completed(){
        $classes = $this->get_classes(1, "<");
        return view('teach.completed', compact(['classes']));
    }

    public function get_classes($status, $date){
        return TutorClass::where([
            ['user_id', Auth::user()->id],
            ['status', '=', $status],
            ['date', $date, date('Y-m-d')]
        ])->orderBy('date')->paginate(10);
    }
}
