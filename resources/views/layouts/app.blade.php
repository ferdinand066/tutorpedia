<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <style>
        .text-title {
            font-size: 1.65rem;
            line-height: 2rem;
        }

    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/layout/index.js') }}" defer></script>
    @yield('style-script')
</head>

<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        @auth
            <div class="h-screen flex overflow-hidden bg-white">
                <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
                <div id="mobile-sidebar" class="fixed inset-0 flex z-40 lg:hidden animate__animated animate__fadeInLeft" role="dialog" aria-modal="true">
                    <!--
                        Off-canvas menu overlay, show/hide based on off-canvas menu state.
                
                        Entering: "transition-opacity ease-linear duration-300"
                        From: "opacity-0"
                        To: "opacity-100"
                        Leaving: "transition-opacity ease-linear duration-300"
                        From: "opacity-100"
                        To: "opacity-0"
                    -->
                    <div class="fixed inset-0 bg-gray-600 bg-opacity-75" aria-hidden="true"></div>

                    <!--
                        Off-canvas menu, show/hide based on off-canvas menu state.
                
                        Entering: "transition ease-in-out duration-300 transform"
                        From: "-translate-x-full"
                        To: "translate-x-0"
                        Leaving: "transition ease-in-out duration-300 transform"
                        From: "translate-x-0"
                        To: "-translate-x-full"
                    -->
                    <div class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-white">
                        <!--
                        Close button, show/hide based on off-canvas menu state.
                
                        Entering: "ease-in-out duration-300"
                            From: "opacity-0"
                            To: "opacity-100"
                        Leaving: "ease-in-out duration-300"
                            From: "opacity-100"
                            To: "opacity-0"
                        -->
                        <div class="absolute top-0 right-0 -mr-12 pt-2">
                            <button
                                class="toggle-sidebar ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                                <span class="sr-only">Close sidebar</span>
                                <!-- Heroicon name: outline/x -->
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <div class="flex-shrink-0 flex items-center px-4">
                            {{-- <img class="h-8 w-auto" src="{{ asset('title.png') }}" alt="Tutorpedia"> --}}
                            <a href="{{ route('home') }}" class="text-title text-indigo-800 font-bold uppercase">Tutorpedia</a>
                        </div>
                        <div class="mt-5 flex-1 h-0 overflow-y-auto">
                            <nav class="px-2">
                                <div class="space-y-1">
                                    <a href="{{ route('home') }}"
                                        class="{{ request()->is('home') ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }} group flex items-center px-2 py-2 text-base leading-5 font-medium rounded-md"
                                        aria-current="page">
                                        <svg class="{{ request()->is('home') ? 'text-gray-500' : 'text-gray-400 group-hover:text-gray-500' }} mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                        </svg>
                                        Home
                                    </a>
 
                                    <a href="{{ route('course.index') }}"
                                        class="{{ request()->is('course*') ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }} group flex items-center px-2 py-2 text-base leading-5 font-medium rounded-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="{{ request()->is('course*') ? 'text-gray-500' : 'text-gray-400 group-hover:text-gray-500' }} mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                          </svg>
                                        Course
                                    </a>

                                    <a href="{{ route('learn.index') }}"
                                        class="{{ request()->is('learn*') ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }} group flex items-center px-2 py-2 text-base leading-5 font-medium rounded-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="{{ request()->is('learn*') ? 'text-gray-500' : 'text-gray-400 group-hover:text-gray-500' }} mr-3 h-6 w-6" 
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                        </svg>
                                        My Learning
                                    </a>

                                    <a href="{{ route('teach.index') }}"
                                        class="{{ request()->is('teach*') ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }} group flex items-center px-2 py-2 text-base leading-5 font-medium rounded-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="{{ request()->is('teach*') ? 'text-gray-500' : 'text-gray-400 group-hover:text-gray-500' }} mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                            <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                          </svg>
                                        Teaching List
                                    </a>

                                    <a href="#"
                                        class="text-gray-600 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-base leading-5 font-medium rounded-md">
                                        <!-- Heroicon name: outline/clock -->
                                        <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Recent
                                    </a>
                                </div>
                                <div class="mt-8">
                                    <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider"
                                        id="teams-headline">
                                        Subscription
                                    </h3>
                                    <div class="mt-1 space-y-1" role="group" aria-labelledby="teams-headline">
                                        @foreach ($followers as $key => $follower)
                                            <a href="#"
                                                class="group flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                                <div class="mr-3 w-8 h-8">
                                                    <img src="{{ $follower->tutor->photo_url }}" alt="" class="w-8 h-8 rounded-full" aria-hidden="true">
                                                </div>
                                                <span class="truncate leading-5" style="width: calc(100% - 3rem)">
                                                    {{ $follower->tutor->name }}
                                                </span>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>

                    <div class="flex-shrink-0 w-14" aria-hidden="true">
                        <!-- Dummy element to force sidebar to shrink to fit close icon -->
                    </div>
                </div>

                <!-- Static sidebar for desktop -->
                <div class="hidden lg:flex lg:flex-shrink-0">
                    <div class="flex flex-col w-64 border-r border-gray-200 pt-5 pb-4 bg-gray-100">
                        <div class="flex items-center flex-shrink-0 px-6">
                            {{-- <img class="h-14 w-auto" src="{{ asset('title.png') }}" alt=""> --}}
                            <a href="{{ route('home') }}" class="text-title text-indigo-800 font-bold uppercase" style="">Tutorpedia</a>
                        </div>
                        <!-- Sidebar component, swap this element with another sidebar if you like -->
                        <div class="h-0 flex-1 flex flex-col overflow-y-auto justify-between">
                            <div class="w-full">
                                @auth
                                    <!-- User account dropdown -->
                                    <div class="px-3 mt-6 relative inline-block text-left w-full">
                                        <div class="w-full">
                                            <button type="button"
                                                class="trigger-dropdown group w-full bg-gray-100 rounded-md px-3.5 py-2 text-sm text-left font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-purple-500"
                                                aria-expanded="false" aria-haspopup="true">
                                                <span class="flex w-full justify-between items-center">
                                                    <span class="flex min-w-0 items-center justify-between space-x-3 w-full">
                                                        @if(Auth::user()->photo_url !== null)
                                                        <img class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0"
                                                            src="{{ Auth::user()->photo_url }}"
                                                            alt="{{ Auth::user()->name }}">
                                                        @else
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 rounded-full p-1.5 bg-gray-200 text-indigo-800" viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                                            </svg>
                                                        @endif
                                                        <span class="flex-1 flex flex-col min-w-0 leading-5"
                                                            style="width: 100%">
                                                            <span
                                                                class="text-gray-900 text-sm font-medium truncate">{{ Auth::user()->name }}</span>
                                                            <div class="flex justify-between">
                                                                <span class="text-gray-500 text-sm truncate">Rp.</span>
                                                                <span
                                                                    class="text-gray-500 text-sm truncate mr-4">{{ Auth::user()->balance }}</span>
                                                            </div>

                                                        </span>
                                                    </span>
                                                    <!-- Heroicon name: solid/selector -->
                                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </div>

                                        <div class="hidden triggered z-10 mx-3 origin-top absolute right-0 left-0 mt-1 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-200 focus:outline-none"
                                            role="menu" aria-orientation="vertical" aria-labelledby="options-menu-button"
                                            tabindex="-1">
                                            <div class="py-1" role="none">
                                                <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                                <a href="profile" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                                    tabindex="-1" id="options-menu-item-0">View profile</a>
                                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                                    tabindex="-1" id="options-menu-item-1">Settings</a>
                                            </div>
                                            <div class="py-1" role="none">
                                                <a href="{{ route('logout') }}" class="text-gray-700 block px-4 py-2 text-sm"
                                                    role="menuitem" tabindex="-1" id="options-menu-item-5" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                @endauth
                                <!-- Navigation -->
                                <nav class="px-3 mt-6">
                                    <div class="space-y-1">
                                        <!-- Current: "bg-gray-200 text-gray-900", Default: "text-gray-700 hover:text-gray-900 hover:bg-gray-50" -->
                                        <a href="{{ route('home') }}"
                                            class="{{ request()->is('home') ? 'bg-gray-200 text-gray-900' : 'text-gray-700 hover:text-gray-900 hover:bg-gray-50' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md"
                                            aria-current="page">
                                            <!--
                                    Heroicon name: outline/home
                    
                                    Current: "text-gray-500", Default: "text-gray-400 group-hover:text-gray-500"
                                    -->
                                            <svg class="{{ request()->is('home') ? 'text-gray-500' : 'text-gray-400 group-hover:text-gray-500' }} mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                            </svg>
                                            Home
                                        </a>

                                        <a href="{{ route('course.index') }}"
                                            class="{{ request()->is('course*') ? 'bg-gray-200 text-gray-900' : 'text-gray-700 hover:text-gray-900 hover:bg-gray-50' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="{{ request()->is('course*') ? 'text-gray-500' : 'text-gray-400 group-hover:text-gray-500' }} mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                              </svg>
                                            Course
                                        </a>

                                        <a href="{{ route('learn.index') }}"
                                            class="{{ request()->is('learn*') ? 'bg-gray-200 text-gray-900' : 'text-gray-700 hover:text-gray-900 hover:bg-gray-50' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="{{ request()->is('learn*') ? 'text-gray-500' : 'text-gray-400 group-hover:text-gray-500' }} mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                              </svg>
                                            My Learning
                                        </a>

                                        <a href="{{ route('teach.index') }}"
                                            class="{{ request()->is('teach*') ? 'bg-gray-200 text-gray-900' : 'text-gray-700 hover:text-gray-900 hover:bg-gray-50' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="{{ request()->is('teach*') ? 'text-gray-500' : 'text-gray-400 group-hover:text-gray-500' }} mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                                <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                            </svg>
                                            Teaching List
                                        </a>

                                        <a href="#"
                                            class="text-gray-700 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                            <!-- Heroicon name: outline/clock -->
                                            <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Recent
                                        </a>
                                    </div>
                                    @if(count($followers) > 0)
                                    <div class="mt-8">
                                        <!-- Secondary navigation -->
                                        <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider"
                                            id="teams-headline">
                                            Subscription
                                        </h3>
                                        <div class="mt-1 space-y-1" role="group" aria-labelledby="teams-headline">
                                            @foreach ($followers as $key => $follower)
                                            <a href="#"
                                                class="group flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                                <div class="mr-3 w-8 h-8">
                                                    <img src="{{ $follower->tutor->photo_url }}" alt="" class="w-8 h-8 rounded-full" aria-hidden="true">
                                                </div>
                                                <span class="truncate leading-5" style="width: calc(100% - 3rem)">
                                                    {{ $follower->tutor->name }}
                                                </span>
                                            </a>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
                                </nav>
                            </div>
                            @guest
                                <div class="flex flex-row m-2 mt-4">
                                    <a href="{{ route('login') }}"
                                        class="w-1/2 order-1 ml-3 inline-flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 sm:order-0 sm:ml-0">
                                        Login
                                    </a>
                                    <a href="{{ route('register') }}"
                                        class="w-1/2 order-0 inline-flex justify-center items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-800 hover:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 sm:order-1 sm:ml-3">
                                        Register
                                    </a>
                                </div>
                            @endguest
                        </div>
                    </div>
                </div>
                <!-- Main column -->
                <div class="flex flex-col w-0 flex-1 overflow-hidden">
                    <!-- Search header -->
                    <div
                        class="relative z-10 flex-shrink-0 flex justify-between h-16 bg-white border-b border-gray-200 lg:hidden">
                        <!-- Sidebar toggle, controls the 'sidebarOpen' sidebar state. -->
                        <button
                            class="toggle-sidebar px-4 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-purple-500 lg:hidden">
                            <span class="sr-only">Open sidebar</span>
                            <!-- Heroicon name: outline/menu-alt-1 -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h8m-8 6h16" />
                            </svg>
                        </button>

                        <span class="text-indigo-800 uppercase text-2xl font-bold flex items-center hidden" id="mobile-title">Tutorpedia</span>

                        <div class="flex items-center mr-3">
                            @auth
                                <!-- Profile dropdown -->
                                <div class="relative">
                                    <div>
                                        <button type="button"
                                            class="trigger-dropdown max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"
                                            id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                            <span class="sr-only">Open user menu</span>
                                            @if(Auth::user()->photo_url !== null)
                                            <img class="h-8 w-8 rounded-full"
                                                src="{{ Auth::user()->photo_url }}"
                                                alt="{{ Auth::user()->name }}">
                                            @else
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 rounded-full p-1 bg-gray-200 text-indigo-800" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                            </svg>
                                            @endif
                                        </button>
                                    </div>

                                    <div class="hidden triggered origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-200 focus:outline-none"
                                        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                        tabindex="-1">
                                        <div class="py-1" role="none">
                                            <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                            <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                                tabindex="-1" id="user-menu-item-0">View profile</a>
                                            <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                                tabindex="-1" id="user-menu-item-1">Settings</a>
                                        </div>
                                        <div class="py-1" role="none">
                                            <a href="{{ route('logout') }}" class="text-gray-700 block px-4 py-2 text-sm"
                                                role="menuitem" tabindex="-1" id="user-menu-item-5" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">Logout</a>
                                        </div>
                                    </div>
                                </div>
                            @endauth
                        </div>
                    </div>
                    <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none flex flex-col justify-between" style="min-height: 100vh">
                        <div>
                            <div class="border-b border-gray-200 px-4 py-2 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
                                <div class="flex flex-wrap hidden md:block">
                                    <div id="major-button" class="relative">
                                        <span class="cursor-pointer border-transparent text-gray-500 hover:text-indigo-700 inline-flex items-center py-4 border-b-2 text-sm font-medium">
                                            Major
                                        </span>
                                        <div id="major-dropdown" class="animate__animated animate__fadeIn absolute origin-top-right leading-7 bg-white border rounded z-50 w-52 flex flex-col hidden">
                                            @foreach ($majors as $index => $major)
                                                <div class="cursor-pointer inline-block whitespace-nowrap hover:bg-gray-200 p-2 truncate major-menu" data-id="{{ $major->id }}">{{ $major->name }}</div>
                                                <div id="major-menu-{{ $major->id }}" class="animate__animated animate__fadeIn absolute leading-7 bg-white border rounded z-50 w-52 flex flex-col left-48 hidden course-list h-full">
                                                    @foreach ($major->courses as $course)
                                                        <a href="{{ route('course.index', ['major_id' => $major->id, 'course_id' => $course->id]) }}" class="cursor-pointer inline-block whitespace-nowrap hover:bg-gray-200 p-2 truncate">{{ $course->name }}</a>
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <form class="flex-1 flex items-center px-2 lg:ml-6 justify-center md:justify-end w-full" action="{{ route('course.index') }}">
                                    <div class="max-w-lg w-full lg:max-w-xs">
                                      <label for="search" class="sr-only">Search</label>
                                      <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                          <!-- Heroicon name: solid/search -->
                                          <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                          </svg>
                                        </div>
                                        <input id="search" name="search" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-indigo-700 focus:border-indigo-700 sm:text-sm" placeholder="Search for anything..." type="search">
                                      </div>
                                    </div>
                                  </form>
                            </div>
                            @yield('content')
                        </div>
                        <footer aria-labelledby="footerHeading">
                            <h2 id="footerHeading" class="sr-only">Footer</h2>
                            <div class="max-w-7xl mx-auto pb-8 px-4 sm:px-6 lg:px-8">
                              <div class="mt-12 border-t border-gray-200 pt-8 md:flex md:items-center md:justify-between lg:mt-16">
                                <div class="flex space-x-6 md:order-2">
                                  <a href="#" class="text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">Facebook</span>
                                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                      <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                                    </svg>
                                  </a>
                          
                                  <a href="#" class="text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">Instagram</span>
                                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                      <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                                    </svg>
                                  </a>
                          
                                  <a href="#" class="text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">Twitter</span>
                                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                      <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                                    </svg>
                                  </a>
                          
                                  <a href="#" class="text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">GitHub</span>
                                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                      <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                                    </svg>
                                  </a>
                          
                                  <a href="#" class="text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">Dribbble</span>
                                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                      <path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd" />
                                    </svg>
                                  </a>
                                </div>
                                <p class="mt-8 text-base text-gray-400 md:mt-0 md:order-1">
                                  &copy; 2021 Tutorpedia, Inc. All rights reserved.
                                </p>
                              </div>
                            </div>
                          </footer>
                    </main>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        @else
            <!-- This example requires Tailwind CSS v2.0+ -->
            <nav class="bg-white shadow">
                <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
                    <div class="relative flex justify-between h-16">
                        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                            <!-- Mobile menu button -->
                            <button type="button"
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                                aria-controls="mobile-menu" aria-expanded="false">
                                <span class="sr-only">Open main menu</span>
                                <!--
                                Icon when menu is closed.
                    
                                Heroicon name: outline/menu
                    
                                Menu open: "hidden", Menu closed: "block"
                                -->
                                <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                                <!--
                                Icon when menu is open.
                    
                                Heroicon name: outline/x
                    
                                Menu open: "block", Menu closed: "hidden"
                                -->
                                <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                            <div class="flex-shrink-0 flex items-center">
                                <a href="{{ route('home') }}" class="text-indigo-800 uppercase text-2xl font-bold">Tutorpedia</a>
                            </div>
                            <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                                <!-- Current: "border-indigo-500 text-gray-900", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" -->
                                <a href="/"
                                    class="{{ request()->is('/') ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                    Home
                                </a>
                            </div>
                        </div>
                        <div class="flex items-center justify-end sm:items-stretch sm:justify-start">
                            <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                                <!-- Current: "border-indigo-500 text-gray-900", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" -->
                                <a href="{{ route('login') }}"
                                    class="{{ request()->is('login') ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                    Login
                                </a>
                                <a href="{{ route('register') }}"
                                    class="{{ request()->is('register') ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                    Register
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mobile menu, show/hide based on menu state. -->
                <div class="sm:hidden" id="mobile-menu">
                    <div class="pt-2 pb-4 space-y-1">
                        <!-- Current: "bg-indigo-50 border-indigo-500 text-indigo-700", Default: "border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700" -->
                        <a href="/"
                            class="{{ request()->is('/') ? 'bg-indigo-50 border-indigo-500 text-indigo-700' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700' }} block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Home</a>
                        <a href="{{ route('login') }}"
                            class="{{ request()->is('login') ? 'bg-indigo-50 border-indigo-500 text-indigo-700' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700' }} block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Login</a>
                        <a href="{{ route('register') }}"
                            class="{{ request()->is('register') ? 'bg-indigo-50 border-indigo-500 text-indigo-700' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700' }} block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Register</a>
                    </div>
                </div>
            </nav>
            <main>
                @yield('content')
                <footer aria-labelledby="footerHeading">
                    <h2 id="footerHeading" class="sr-only">Footer</h2>
                    <div class="max-w-7xl mx-auto pb-8 px-4 sm:px-6 lg:px-8">
                      <div class="mt-12 border-t border-gray-200 pt-8 md:flex md:items-center md:justify-between lg:mt-16">
                        <div class="flex space-x-6 md:order-2">
                          <a href="#" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">Facebook</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                              <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                            </svg>
                          </a>
                  
                          <a href="#" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">Instagram</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                              <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                            </svg>
                          </a>
                  
                          <a href="#" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">Twitter</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                              <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                            </svg>
                          </a>
                  
                          <a href="#" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">GitHub</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                              <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                            </svg>
                          </a>
                  
                          <a href="#" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">Dribbble</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                              <path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd" />
                            </svg>
                          </a>
                        </div>
                        <p class="mt-8 text-base text-gray-400 md:mt-0 md:order-1">
                          &copy; 2021 Tutorpedia, Inc. All rights reserved.
                        </p>
                      </div>
                    </div>
                  </footer>    
            </main>    
        @endauth
    </div>
    
</body>

</html>
