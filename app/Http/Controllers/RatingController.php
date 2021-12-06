<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\TutorClass;
use App\Models\TutorClassDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
            'tutor_class_id' => 'exists:tutor_classes,id',
            'rating' => 'between:1,5',
            'description' => 'required'
        ]);

        $tutor_class = TutorClass::find($validated['tutor_class_id']);
        if ($tutor_class->date > date('Y-m-d')){
            return redirect()->back()->withErrors('You only can make review in completed class!');
        }

        $tutor_class_detail = TutorClassDetail::where(
            [
                ['tutor_class_id', $validated['tutor_class_id']],
                ['user_id', Auth::user()->id]
            ])->first();

        if (!$tutor_class_detail){
            return redirect()->back()->withErrors('You are not a participant of this class!');
        }
        
        $validated['user_id'] = Auth::user()->id;

        // dd($validated);

        Rating::upsert([$validated], 
            ['user_id', 'tutor_class_id'], 
            ['rating', 'description']);

        return redirect()->back()->with('success', 'Success insert a review!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function edit(Rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rating $rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rating $rating)
    {
        //
    }
}
