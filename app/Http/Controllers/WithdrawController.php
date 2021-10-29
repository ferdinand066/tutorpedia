<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('withdraw.index');
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
            'bank_number' => ['required', 'string', 'regex:/^[0-9]+$/'],
            'bank_name' => 'required|string',
            'bank_account_name' => 'required|string',
            'nominal' => 'required|numeric|between:1000,' . Auth::user()->balance
        ]);

        $invalid = Withdraw::where('user_id', Auth::user()->id)->whereNull('admin_id')->get();
        if (count($invalid) > 0){
            return redirect()->back()->withErrors("You have requested for a withdrawal of funds before, please wait for confirmation from the admin.");
        }

        $validated['user_id'] = Auth::user()->id;
        $validated['balance'] = $validated['nominal'];
        $validated['bank_username'] = $validated['bank_account_name'];
        unset($validated['nominal']);
        unset($validated['bank_account_name']);

        updateUserBalance(Auth::user(), $validated['balance'] * -1);

        $validated['balance'] = $validated['balance'] * 80 / 100;

        Withdraw::create($validated);



        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function show(Withdraw $withdraw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function edit(Withdraw $withdraw)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Withdraw $withdraw)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function destroy(Withdraw $withdraw)
    {
        //
    }
}
