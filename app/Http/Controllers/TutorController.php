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
        $classes = $this->get_classes(1);
        return view('teach.index', compact(['classes', 'top_classes']));
    }

    public function pending(){
        $classes = $this->get_classes(0);
        return view('teach.pending', compact(['classes']));
    }

    public function get_classes($status){
        return TutorClass::where([
            ['user_id', Auth::user()->id],
            ['status', '=', $status],
            ['date', '>=', date('Y-m-d')]
        ])->orderBy('date')->paginate(10);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TutorClass $teach)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
