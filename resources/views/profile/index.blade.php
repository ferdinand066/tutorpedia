@extends('layouts.app')
@section('content')
<div class="px-4 py-4 flex flex-col sm:flex-row sm:px-6 lg:px-8 gap-10">
     
        <div class="justify-between">
            {{-- input photos --}}
            <img class="w-32 h-32 rounded-full shadow-xl" src="{{ getPicture('profile', Auth::user()->photo_url) }}" alt="">
           
        </div>
        <div class="leading-6 flex flex-col justify-center">
            {{-- Name --}}
            <div class="text-xl">
                {{ Auth::user()->name }}
            </div>
            {{-- Email --}}
            <div class="text-xs">
                {{ Auth::user()->email }}
            </div>
            {{-- Balance --}}
            <div class="flex justify-between">
                <span class="text-black text-xs truncate">Rp.</span>
                <span
                    class="text-black text-xs truncate mr-4">{{ Auth::user()->balance }}</span>
            </div>
        
        </div>
    
</div>

<div class="px-4 py-4 flex flex-col sm:flex-row sm:px-6 lg:px-8 gap-10">
    {{-- account detail --}}
    <div>
       <div class="border-t-2 text-lg py-3 font-semibold">
        About
       </div>
        
       <div class="leading-6 text-xs p-3 object-cover bg-gray-100 rounded-t rounded-b">
        {{ Auth::user()->about }}
       </div>
    </div>
</div>



<div class="px-4 py-4 w-full flex flex-col sm:flex-row sm:px-6 lg:px-8">
    <div class="flex w-full space-x-5">

        {{-- Phone --}}
        <div class="flex-1 text-sm font-semibold">
            <div class="my-3">Phone Number</div>
            <div class="text-xs px-3 py-3 object-cover bg-gray-100 rounded-t rounded-b">
                {{ Auth::user()->phone_number }}
            </div>
        </div>
        {{-- Univerity --}}
        <div class="flex-1 text-sm font-semibold">
            <div class="my-3">University</div>
            <div class="text-xs px-3 py-3 object-cover bg-gray-100 rounded-t rounded-b">
                {{ Auth::user()->university->name }}
            </div>
        </div>
    </div>
</div>

<div class="px-4 py-4 flex flex-col sm:flex-row sm:px-6 lg:px-8 gap-5">
    <div class="flex w-full space-x-5">
        <div class="flex-1 text-sm font-semibold">
            <div class="my-3">Social Media</div>
            <div class="text-xs px-3 py-3 object-cover bg-gray-100 rounded-t rounded-b leading-5">
                @php
                 $socials = Auth::user()->social_media ?? ''; 
                @endphp
                @if($socials !== '')
                    @php
                        $socials = json_decode($socials);
                    @endphp
                        @foreach ($socials as $key => $social)
                            <div class="text-xs text-gray-900">
                                <span class="capitalize">{{ $key }} : </span>
                                <a href="{{ $social }}">{{ $social }}</a>
                            </div>
                        @endforeach
                @endif
            </div>
        </div>
        <div class="hidden md:flex flex-1 text-sm font-semibold">
        </div>
    </div>

</div>

<div class="px-4 py-4 flex flex-col sm:px-6 lg:px-8 gap-10">
    <div class="text-lg font-semibold">
        Active Class
    </div>
    <ul class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
        @foreach (Auth::user()->active_classes as $tutor_class)
            @include('components.card.class', ['tutor_class' => $tutor_class, 'course' => $tutor_class->course])
        @endforeach
        
        <!-- More people... -->
      </ul>
</div>
@endsection