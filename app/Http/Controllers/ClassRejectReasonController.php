<?php

namespace App\Http\Controllers;

use App\Models\ClassRejectReason;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassRejectReasonController extends Controller
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
        $validated = $request->validate([
            'reason' => 'required',
            'tutor_class_id' => 'exists:tutor_classes,id'
        ]);

        ClassRejectReason::create([
            'user_id' => Auth::user()->id,
            'tutor_class_id' => $validated['tutor_class_id'],
            'description' => $validated['reason']
        ]);

        return redirect()->back(302);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassRejectReason  $classRejectReason
     * @return \Illuminate\Http\Response
     */
    public function show(ClassRejectReason $classRejectReason)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassRejectReason  $classRejectReason
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassRejectReason $classRejectReason)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClassRejectReason  $classRejectReason
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassRejectReason $classRejectReason)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassRejectReason  $classRejectReason
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassRejectReason $classRejectReason)
    {
        //
    }
}
