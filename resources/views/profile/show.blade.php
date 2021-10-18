@extends('layouts.app')
@section('content')
<div class="px-4 py-4 flex flex-col sm:flex-row sm:px-6 lg:px-8 gap-10">
     
        <div class="justify-between">
            {{-- input photos --}}
            <img class="w-32 h-32 rounded-full shadow-xl" src="{{ $profile->photo_url }}" alt="">
           
        </div>
        <div class="leading-6 flex flex-col justify-center">
            {{-- Name --}}
            <div class="text-xl">
                {{ $profile->name }}
            </div>
            {{-- Email --}}
            <div class="text-xs">
                {{ $profile->email }}
            </div>
            @if (canSubscribe($profile->id))
                <form class="flex mt-1.5" action="{{ route('subscribe.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="tutor_id" value="{{ $profile->id }}">
                    <button type="submit" class="uppercase cursor-pointer inline-flex items-center px-4 py-1 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Subscribe
                    </button>
                </form>
            @elseif (Auth::user()->id !== $profile->id)
                <form class="flex mt-1.5" action="{{ route('subscribe.destroy', ['subscribe' => $profile]) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="uppercase cursor-pointer inline-flex items-center px-4 py-1 border text-white bg-gray-400 border-gray-400 shadow-sm text-sm font-medium rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Unsubscribe
                    </button>
                </form>
            @endif
        </div>
    
</div>

<div class="px-4 py-4 flex flex-col sm:flex-row sm:px-6 lg:px-8 gap-10">
    {{-- account detail --}}
    <div>
       <div class="border-t-2 text-lg py-3 font-semibold">
        About
       </div>
        
       <div class="leading-6 text-xs p-3 object-cover bg-gray-100 rounded-t rounded-b">
        {{ $profile->about }}
       </div>
    </div>
</div>



<div class="px-4 py-4 w-full flex flex-col sm:flex-row sm:px-6 lg:px-8">
    <div class="flex w-full space-x-5">

        {{-- Phone --}}
        <div class="flex-1 text-sm font-semibold">
            <div class="my-3">Phone Number</div>
            <div class="text-xs px-3 py-3 object-cover bg-gray-100 rounded-t rounded-b">
                {{ $profile->phone_number }}
            </div>
        </div>
        {{-- Univerity --}}
        <div class="flex-1 text-sm font-semibold">
            <div class="my-3">University</div>
            <div class="text-xs px-3 py-3 object-cover bg-gray-100 rounded-t rounded-b">
                {{ $profile->university->name }}
            </div>
        </div>
    </div>
</div>

<div class="px-4 py-4 flex flex-col sm:flex-row sm:px-6 lg:px-8 gap-10">
    <div class="flex w-full space-x-5">
        <div class="flex-1 text-sm font-semibold">
            <div class="my-3">Social Media</div>
            <div class="text-xs px-3 py-3 object-cover bg-gray-100 rounded-t rounded-b leading-5">
                @php
                 $socials = $profile->social_media ?? ''; 
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

<div class="px-4 py-4 flex flex-col sm:px-6 lg:px-8 gap-5">
    <div class="text-lg font-semibold">
        Active Class
    </div>
    <ul class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($profile->active_classes as $tutor_class)
            @include('components.card.class', ['tutor_class' => $tutor_class, 'course' => $tutor_class->course])
        @endforeach
        
        <!-- More people... -->
      </ul>
</div>
@endsection