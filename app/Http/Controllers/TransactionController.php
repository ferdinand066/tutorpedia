<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TutorClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::where('user_id', Auth::user()->id)->latest()->paginate(10);
        return view('transaction.index', compact(['transactions']));
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
        $detail_list = Transaction::pluck('detail_id')->toArray();
        $tutorClass = TutorClass::where([
            ['date', '<', date('Y-m-d')],
            ['status', '=', 1]
        ])->whereNotIn('id', $detail_list)->get();

        $result = [];

        foreach($tutorClass as $class){
            $balance = count($class->tutor_class_details) * $class->price;
            $data['id'] = Str::uuid();
            $data['detail_id'] = $class->id;
            $data['balance'] = $balance;
            $data['description'] = 'Class Owner';
            $data['user_id'] = $class->user_id;
            $data['created_at'] = now();
            $data['updated_at'] = now();

            updateUserBalance($class->user, $balance);

            array_push($result, $data);
        }

        Transaction::insert($result);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
