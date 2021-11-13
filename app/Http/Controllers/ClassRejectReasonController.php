<?php

namespace App\Http\Controllers;

use App\Models\ClassRejectReason;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassRejectReasonController extends Controller
{
 
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
            'religion' => 'exists:tutor_classes,id'
        ]);

        ClassRejectReason::create([
            'user_id' => Auth::user()->id,
            'tutor_class_id' => $validated['tutor_class_id'],
            'description' => $validated['reason']
        ]);

        return redirect()->back(302);
    }
}
