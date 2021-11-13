<?php

namespace App\Http\Controllers;

use App\Models\University;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile.index');
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $profile)
    {
        return view('profile.show', compact(['profile']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $profile)
    {
        if($profile->id !== Auth::user()->id) return redirect()->route('home');
        $universities = University::where('name', '!=', 'Others')->orderBy('name')->get();
        $other = University::where('name', '=', 'Others')->first();
        return view('profile.edit', compact(['universities', 'other']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $profile)
    {
        $validated = $request->validate([
            'university_id' => 'exists:universities,id',
            'name' => 'required',
            'photo_url' => 'image',
            'phone_number' => 'required',
            'about' => 'required',
            'social_media_key' => 'array',
            'social_media_key.*' => 'required|string|distinct',
            'social_media_value' => 'array',
            'social_media_value.*' => 'required|string|distinct',
        ]);

        $data = [];

        foreach($validated['social_media_key'] as $idx => $val){
            $data[$val] = $validated['social_media_value'][$idx];
        }

        unset($validated['social_media_key']);
        unset($validated['social_media_value']);

        $validated['social_media'] = json_encode($data);

        $filename = time() . "_" . Auth::user()->id . '.' . $request->photo_url->getClientOriginalExtension();

        $request->photo_url->storeAs('public/profile', $filename);

        $validated['photo_url'] = $filename;

        $profile->update($validated);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
