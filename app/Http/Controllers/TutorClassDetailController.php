<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TutorClass;
use App\Models\TutorClassDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TutorClassDetailController extends Controller
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
            'tutor_class_id' => 'exists:tutor_classes,id'
        ]);

        $tutor_class = TutorClass::find($validated['tutor_class_id']);

        if (updateUserBalance(Auth::user(), $tutor_class->price * -1)){
            TutorClassDetail::create([
                'tutor_class_id' => $validated['tutor_class_id'],
                'user_id' => Auth::user()->id,
                'status' => 1
            ]);

            Transaction::create([
                'detail_id' => $validated['tutor_class_id'],
                'balance' => $tutor_class->price,
                'description' => 'Class Member',
                'user_id' => Auth::user()->id
            ]);
    
            return redirect()->route('home')->with('success', 'Successfully join to the class');
        }

        return redirect()->route('home')->withErrors('Your balance is not enough!');

        
    }
}
