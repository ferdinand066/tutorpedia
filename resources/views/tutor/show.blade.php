@extends('layouts.app')
@section('style-script')
<script>
    $(function () {
        let ratingList = ['Poor', 'Fair', 'Average', 'Good', 'Excellent']

        $('.star').on('click', function(){
            let starId = $(this).attr('id')
            let rating = starId.split('-')[1]
            if (rating !== null){
                $('#rating').val(rating)

                let star = $('.star')
                star.addClass('text-gray-300')
                star.removeClass('text-yellow-300')

                for(let i=0; i<rating; i++){
                    star.eq(i).toggleClass('text-gray-300')
                    star.eq(i).toggleClass('text-yellow-300')
                }

                $('#ratingDesc').text(ratingList[rating - 1])

            }
        })
    });
</script>
@endsection
@section('content')
<div class="px-4 py-4 flex flex-col sm:flex-row sm:px-6 lg:px-8 gap-4">
    <div class="sm:w-2/3 flex flex-col gap-4">
        <div class="bg-white rounded shadow border-sm">
            <div class="w-full relative">
                <img src="{{ $class->course->major->photo_url }}" alt="" class="w-full h-48 sm:h-72 object-cover rounded-t">
                <div class="absolute bottom-2 right-2">
                    @if($class->user->photo_url !== null)
                        <img class="w-12 h-12 sm:w-16 sm:h-16 bg-white rounded-full flex-shrink-0" src="{{ getPicture('profile', $class->user->photo_url) }}" alt="">
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 sm:w-16 sm:h-16 rounded-full p-2 bg-gray-200 text-indigo-800" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>
                    @endif
                </div>
            </div>
            <div class="p-6 leading-8">
                <div class="flex justify-between content-center">
                    <h1 class="text-lg sm:text-2xl font-bold">{{$class->name}}</h1>
                    @if(Auth::user()->can('update-self-data', $class) && !$class->status)
                    <a href="{{ route('class.edit', $class) }}" class="cursor-pointer flex content-center text-gray-500 hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </a>
                    @endif
                </div>
                <div class="flex flex-row justify-between">
                    <a href="{{ route('profile.show', ['profile' => $class->user]) }}">by {{ $class->user->name }}</a>
                    <span>{{ $class->course->name }}</span>
                </div>
                <div class="flex flex-row justify-between items-center mt-3">
                    <h3 class="text-md sm:text-lg">{{ 'Rp. ' . number_format($class->price,2,",",".") }}</h3>
                    @if($can_buy && $class->status)
                        <form method="post" action="{{ route('class.detail.store') }}">
                            @csrf
                            <input type="hidden" name="tutor_class_id" id="class_id" value="{{ $class->id }}">
                            <button type="submit" class="leading-5 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Add to Cart
                                <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 -mr-1 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </button>
                        </form>
                    @elseif(!$class->status)
                    @else
                        <h3 class="text-md sm:text-lg">{{ ($class->user->id === Auth::user()->id) ? 'Owner' : 'Joined' }}</h3>
                    @endif
                </div>
                @if(!$class->status)
                    <div class="mt-4">
                        <div class="text-sm font-medium text-gray-500 truncate leading-4">
                            Status
                        </div>
                        <div class="flex flex-row justify-between">
                            <div class="mt-1 text-xl font-semibold text-gray-900 leading-6">
                                Pending
                            </div>
                            <form action="{{ route('admin.class.update', $class) }}" method="post">
                                @method('patch')
                                @csrf
                                <button type="submit" class="leading-5 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-800 hover:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-800">
                                    Confirm Class
                                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 -mr-1 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                      </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                @endif
                @if(!$can_buy)
                    <div class="mt-4">
                        <div class="text-sm font-medium text-gray-500 truncate leading-4">
                            Link
                        </div>
                        <div class="mt-1 text-xl font-semibold text-gray-900 leading-6">
                            <a href="{{ $class->link }}">{{ $class->link }}</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        @if(!$class->status)
            @if(Auth::user()->can('update-self-data', $class) || Auth::user()->can('manage-data'))
            <div class="bg-white rounded shadow border-sm">
                <div class="p-6 leading-8 flex flex-col">
                    <h1 class="text-lg sm:text-xl font-bold">Rejected Reason</h1>
                    <ul class="px-4 leading-8">
                        @foreach ($class->class_reject_reasons as $reject)
                            <li class="flex align-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 my-auto text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>{{ $reject->created_at . ' - ' . $reject->description }}</span>
                                <span class="text-xs">by. {{ $reject->user->name }}</span>
                            </li>
                        @endforeach
                    </ul>
                    @can('manage-data')
                    <form action="{{ route('admin.reject.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="tutor_class_id" value="{{ $class->id }}">
                        <label for="reason" class="block text-gray-700 text-sm font-bold">
                            {{ __('Reason') }}:
                        </label>

                        <div class="flex flex-row">
                            <input id="reason" type="text" class="form-input focus:ring-indigo-800 focus:border-indigo-800 flex-1 block w-full rounded-none rounded-md sm:text-sm border-gray-300 w-3/4 @error('reason') border-red-500 @enderror"
                                name="reason" value="{{ old('reason') }}" required>
                            <button type="submit" class="cursor-pointer inline-flex items-center px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-800 hover:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-800 sm:ml-3">
                                Submit
                            </button>
                        </div>
                    </form>
                    @endcan
                </div>
            </div>
            @endif
        @endif

        <div class="bg-white rounded shadow border-sm">
            <div class="p-6 leading-8 flex flex-col">
                <h1 class="text-lg sm:text-xl font-bold">Date Information</h1>
                <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2">
                    <div class="p-4 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                      <dt class="text-sm font-medium text-gray-500 truncate">
                        Start Date
                      </dt>
                      <dd class="mt-1 text-xl font-semibold text-gray-900">
                        {{ date('l, d M Y', strtotime($class->date)) }}
                      </dd>
                    </div>
                
                    <div class="p-4 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                      <dt class="text-sm font-medium text-gray-500 truncate">
                        Time
                      </dt>
                      <dd class="mt-1 text-xl font-semibold text-gray-900">
                        {{ $class->start_time . ' - ' . $class->end_time }}
                      </dd>
                    </div>
                  </dl>

                <h1 class="text-lg sm:text-xl font-bold mt-8">Participant Detail</h1>
                <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2">
                    <div class="p-4 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                      <dt class="text-sm font-medium text-gray-500 truncate">
                        Participant Range
                      </dt>
                      <dd class="mt-1 text-xl font-semibold text-gray-900">
                        {{ $class->minimum_person . ' - ' . $class->maximum_person }}
                      </dd>
                    </div>
                
                    <div class="p-4 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                      <dt class="text-sm font-medium text-gray-500 truncate">
                        Current Participant
                      </dt>
                      <dd class="mt-1 text-xl font-semibold text-gray-900">
                        {{ count($class->tutor_class_details) }}
                      </dd>
                    </div>
                  </dl>
            </div>
        </div>

        <div class="bg-white rounded shadow border-sm">
            <div class="p-6 leading-8 flex flex-col">
                <h1 class="text-lg sm:text-xl font-bold">Description</h1>
                <span class="leading-7">{{ $class->description }}</span>
            </div>
        </div>

        <div class="bg-white rounded shadow border-sm">
            <div class="p-6 leading-8 flex flex-col">
                <h1 class="text-lg sm:text-xl font-bold">Requirement</h1>
                <ul class="px-4 leading-8">
                    @php
                        $requirements = json_decode($class->requirement);
                    @endphp
                    @foreach ($requirements as $requirement)
                        <li class="flex align-center gap-2">
                            <svg class="h-5 w-5 my-auto text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                              </svg>
                            <span>{{ $requirement }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
    <div class="sm:w-1/3 flex flex-col gap-4">
        <div class="bg-white rounded shadow p-4 border-sm flex flex-col gap-4 leading-5">
            <h1 class="text-lg sm:text-xl font-bold">Tutor Information</h1>
            <div class="flex content-center justify-center">
                @if($class->user->photo_url !== null)
                    <img class="w-32 h-32 rounded-full shadow-xl" src="{{  getPicture('profile', $class->user->photo_url)  }}" alt="">
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-32 h-32 rounded-full p-3 bg-gray-200 text-indigo-800" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                    </svg>
                @endif
            </div>
            @if (canSubscribe($class->user_id))
                <form class="flex content-center justify-center" action="{{ route('subscribe.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="tutor_id" value="{{ $class->user->id }}">
                    <button type="submit" class="uppercase cursor-pointer inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Subscribe
                    </button>
                </form>
            @elseif (Auth::user()->id !== $class->user_id)
                <form class="flex content-center justify-center" action="{{ route('subscribe.destroy', ['subscribe' => $class->user]) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="uppercase cursor-pointer inline-flex items-center px-4 py-2 border text-white bg-gray-400 border-gray-400 shadow-sm text-sm font-medium rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Unsubscribe
                    </button>
                </form>
            @endif
            
            <div>
                <div class="text-sm font-medium text-gray-500 truncate">
                    Name
                </div>
                <div class="mt-1 text-xl font-semibold text-gray-900">
                    {{ $class->user->name }}
                </div>
            </div>
            @php
                $rating_user = getRating($class->user);
            @endphp
            <div>
                <div class="text-sm font-medium text-gray-500 truncate">
                    Rating
                </div>
                <div class="mt-1 text-xl font-semibold text-gray-900 flex flex-row space-x-4">
                    <span>
                        {{ $rating_user[0] . (($rating_user[1] > 0) ? ' / 5 ' : '') }} 
                    </span>
                    @if($rating_user[1] > 0)
                    <div class="flex flex-row content-center space-x-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>
                        <span>
                            {{ $rating_user[1] }}
                        </span>
                    </div>
                    @endif
                </div>
            </div>
            <div>
                <div class="text-sm font-medium text-gray-500 truncate">
                    University
                </div>
                <div class="mt-1 text-xl font-semibold text-gray-900">
                    {{ $class->user->university->name }}
                </div>
            </div>
            <div>
                <div class="text-sm font-medium text-gray-500 truncate">
                    Phone number
                </div>
                <div class="mt-1 text-xl font-semibold text-gray-900">
                    {{ $class->user->phone_number }}
                </div>
            </div>
            <div>
                <div class="text-sm font-medium text-gray-500 truncate">
                    About
                </div>
                <div class="mt-1 text-sm text-gray-900">
                    {{ $class->user->about ?? '-' }}
                </div>
            </div>
            @php
                $socials = $class->user->social_media ?? ''; 
            @endphp
            @if($socials !== '')
                @php
                    $socials = json_decode($socials);
                @endphp
                <div>
                    <div class="text-sm font-medium text-gray-500 truncate">
                        Social Media
                    </div>
                    @foreach ($socials as $key => $social)
                        <div class="mt-1 text-sm text-gray-900">
                            <span class="capitalize font-medium">{{ $key }} : </span>
                            <a class="break-all" href="{{ $social }}">{{ $social }}</a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="bg-white rounded shadow p-4 border-sm flex flex-col gap-4 leading-5">
            <h1 class="text-lg sm:text-xl font-bold">Tutor Class Recommendation</h1>
            <ul class="grid grid-cols-1 gap-4">
                @foreach ($recommendations as $recommendation)
                    @include('components.card.class', ['tutor_class' => $recommendation, 'course' => $recommendation->course])
                @endforeach
            </ul>
        </div>
    </div>
</div>
@if($class->date < date('Y-m-d'))
@if(Gate::check('rating', $class) || count($class->ratings) > 0)
<div class="px-4 flex sm:px-6 lg:px-8 gap-4 w-full">
    <div class="bg-white rounded shadow border-sm w-full">
        <div class="p-6 leading-8 flex flex-col">
            <h1 class="text-lg sm:text-xl font-bold">Rating</h1>
            <p class="text-sm text-gray-500">How about the course?</p>
            <ul class="leading-5">
                @foreach ($class->ratings as $rating)
                    <li class="flex align-center p-2 justify-between flex-col md:flex-row">
                        <div class="flex flex-row space-x-4 w-full md:w-1/2">
                            <img src="{{ getPicture('profile', $rating->user->photo_url) }}" alt="" class="w-16 h-16 rounded-full">
                            <div class="flex flex-col md:mt-2.5" style="width: calc(100% - 6.5rem)">
                                <div class="truncate font-semibold">{{ $rating->user->name }}</div>
                                <div>{{ $rating->created_at }}</div>
                                <div class="flex flex-col md:hidden space-y-2 mt-2">
                                    <div class="flex">
                                        @foreach (range(1, 5) as $i)
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 {{ ($i <= $rating->rating) ? 'text-yellow-300' : 'text-gray-300' }}" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        @endforeach
                                    </div>
                                    <div class="p-3 bg-gray-200 rounded">
                                        {{ $rating->description }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hidden md:block w-1/2 space-y-2">
                            <div class="flex">
                                @foreach (range(1, 5) as $i)
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 {{ ($i <= $rating->rating) ? 'text-yellow-300' : 'text-gray-300' }}" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endforeach
                            </div>
                            <div class="p-3 bg-gray-200 rounded">
                                {{ $rating->description }}
                            </div>
                        </div>
                        {{-- <span class="text-xs">by. {{ $reject->user->name }}</span> --}}
                    </li>
                @endforeach
            </ul>
            @can('rating', $class)
            <form action="{{ route('rating.store') }}" method="post" class="p-2">
                @csrf
                <input type="hidden" name="tutor_class_id" value="{{ $class->id }}">
                <div class="flex mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" id="star-1" class="star h-8 w-8 text-gray-300" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" id="star-2" class="star h-8 w-8 text-gray-300" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" id="star-3" class="star h-8 w-8 text-gray-300" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" id="star-4" class="star h-8 w-8 text-gray-300" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" id="star-5" class="star h-8 w-8 text-gray-300" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <span class="mx-2 text-sm text-gray-500" id="ratingDesc"></span>
                </div>
                <label for="reason" class="block text-gray-700 text-sm font-bold">
                    {{ __('Reason') }}:
                </label>
                <div class="flex flex-col md:flex-row space-y-2 md:space-y-0">
                    <input type="hidden" name="rating" id="rating" value="0">
                    <textarea name="description" id="description" class="form-input focus:ring-indigo-800 focus:border-indigo-800 flex-1 block w-full rounded-none rounded-md sm:text-sm border-gray-300 w-3/4 @error('description') border-red-500 @enderror"></textarea>
                    <button type="submit" class="w-20 h-10 text-center cursor-pointer inline-flex items-center px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-800 hover:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-800 md:ml-3">
                        Submit
                    </button>
                </div>
            </form>
            @endcan
        </div>
    </div>
</div>
@endif
@endif
@endsection