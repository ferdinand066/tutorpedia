@extends('layouts.app')
@section('style-script')
    <script src="{{ asset('js/home/index.js') }}" defer></script>
    <style>
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;  
            overflow: hidden;
        }
    </style>
@endsection
@section('content')
<!-- Page title & actions -->
<div class="px-4 py-4 sm:flex sm:flex-col sm:justify-between sm:px-6 lg:px-8 gap-4">
    <div class="flex-1 min-w-0 text-center">
        <h1 class="text-2xl font-medium leading-6 text-gray-900 sm:truncate">
            What to learn next
        </h1>
    </div>
    @foreach ($majors as $major)
    <div class="flex-1 min-w-0 mt-4">
        <h1 class="text-xl font-medium leading-6 text-gray-900 sm:truncate my-6">
            Recommended tutor class at {{ $major->name }}
        </h1>
        <ul class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($data[$major->id] as $tutor_class)
                @include('components.card.class', ['tutor_class' => $tutor_class, 'course' => $tutor_class->course])
            @endforeach
            
            <!-- More people... -->
          </ul>
    </div>
    @endforeach
    
</div>
@endsection
