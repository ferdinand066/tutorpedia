@extends('layouts.app')
@section('content')
<div class="px-4 py-4 flex flex-col sm:flex-row sm:px-6 lg:px-8 gap-4">
    <div class="sm:w-2/3 bg-white rounded shadow border-sm">
        <div class="w-full">
            <img src="{{ $tutor->course->major->photo_url }}" alt="" class="w-full h-72 object-cover rounded-t">
        </div>
        <div class="p-4">
            <h1 class="text-lg sm:text-xl font-bold">{{$tutor->name}}</h1>
        </div>
    </div>
    <div class="sm:w-1/3 bg-white rounded shadow p-4 border-sm">asd</div>
</div>
@endsection