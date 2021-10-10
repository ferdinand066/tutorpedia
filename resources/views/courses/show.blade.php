@extends('layouts.app')
@section('content')
<div class="px-4 py-4 sm:flex sm:flex-col sm:justify-between sm:px-6 lg:px-8 gap-4">
    <div class="flex-1 min-w-0 text-center">
        <h1 class="text-2xl font-medium leading-6 text-gray-900 sm:truncate">
            Course List
        </h1>
    </div>
    <div class="flex-1 min-w-0 mt-4">
        @if(isset($course))
        <h1 class="text-xl font-medium leading-6 text-gray-900 sm:truncate my-6">
            Recommended tutor for {{ $course->name }} ( {{ $course->major->name }} )
        </h1>
        <ul class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($course->tutor_classes as $tutor_class)
              @include('components.card.class', compact(['course', 'tutor_class']))
            @endforeach
        </ul>
        @else
        <h1 class="text-xl font-medium leading-6 text-gray-900 sm:truncate my-6">
            All course for {{ $courses[0]->major->name }}
        </h1>
        <ul class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($courses as $course)
              @foreach ($course->tutor_classes as $tutor_class)
                @include('components.card.class', compact(['course', 'tutor_class']))
              @endforeach
            @endforeach
        </ul>
        @endif
    </div>
</div>
@endsection