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

    <style>
        .text-title {
            font-size: 1.65rem;
            line-height: 2rem;
        }

    </style>
</head>

<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        @auth
            <div class="h-screen flex overflow-hidden bg-white">
                <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
                <div class="fixed inset-0 flex z-40 lg:hidden hidden" role="dialog" aria-modal="true">
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
                                class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
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
                            <span class="text-title text-indigo-800 font-bold uppercase">Tutorpedia</span>
                        </div>
                        <div class="mt-5 flex-1 h-0 overflow-y-auto">
                            <nav class="px-2">
                                <div class="space-y-1">
                                    <!-- Current: "bg-gray-100 text-gray-900", Default: "text-gray-600 hover:text-gray-900 hover:bg-gray-50" -->
                                    <a href="#"
                                        class="bg-gray-100 text-gray-900 group flex items-center px-2 py-2 text-base leading-5 font-medium rounded-md"
                                        aria-current="page">
                                        <!--
                                Heroicon name: outline/home
                
                                Current: "text-gray-500", Default: "text-gray-400 group-hover:text-gray-500"
                                -->
                                        <svg class="text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                        </svg>
                                        Home
                                    </a>

                                    <a href="#"
                                        class="text-gray-600 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-base leading-5 font-medium rounded-md">
                                        <!-- Heroicon name: outline/view-list -->
                                        <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                        </svg>
                                        My tasks
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
                                        Teams
                                    </h3>
                                    <div class="mt-1 space-y-1" role="group" aria-labelledby="teams-headline">
                                        <a href="#"
                                            class="group flex items-center px-3 py-2 text-base leading-5 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                            <span class="w-2.5 h-2.5 mr-4 bg-indigo-500 rounded-full"
                                                aria-hidden="true"></span>
                                            <span class="truncate">
                                                Engineering
                                            </span>
                                        </a>

                                        <a href="#"
                                            class="group flex items-center px-3 py-2 text-base leading-5 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                            <span class="w-2.5 h-2.5 mr-4 bg-green-500 rounded-full"
                                                aria-hidden="true"></span>
                                            <span class="truncate">
                                                Human Resources
                                            </span>
                                        </a>

                                        <a href="#"
                                            class="group flex items-center px-3 py-2 text-base leading-5 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                            <span class="w-2.5 h-2.5 mr-4 bg-yellow-500 rounded-full"
                                                aria-hidden="true"></span>
                                            <span class="truncate">
                                                Customer Success
                                            </span>
                                        </a>
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
                            <span class="text-title text-indigo-800 font-bold uppercase" style="">Tutorpedia</span>
                        </div>
                        <!-- Sidebar component, swap this element with another sidebar if you like -->
                        <div class="h-0 flex-1 flex flex-col overflow-y-auto justify-between">
                            <div class="w-full">
                                @auth
                                    <!-- User account dropdown -->
                                    <div class="px-3 mt-6 relative inline-block text-left w-full">
                                        <div class="w-full">
                                            <button type="button"
                                                class="group w-full bg-gray-100 rounded-md px-3.5 py-2 text-sm text-left font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-purple-500"
                                                id="options-menu-button" aria-expanded="false" aria-haspopup="true">
                                                <span class="flex w-full justify-between items-center">
                                                    <span class="flex min-w-0 items-center justify-between space-x-3 w-full">
                                                        <img class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0"
                                                            src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixqx=nkXPoOrIl0&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80"
                                                            alt="">
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

                                        <!--
                                            Dropdown menu, show/hide based on menu state.
                                
                                            Entering: "transition ease-out duration-100"
                                                From: "transform opacity-0 scale-95"
                                                To: "transform opacity-100 scale-100"
                                            Leaving: "transition ease-in duration-75"
                                                From: "transform opacity-100 scale-100"
                                                To: "transform opacity-0 scale-95"
                                            -->
                                        <div class="z-10 mx-3 origin-top absolute right-0 left-0 mt-1 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-200 focus:outline-none"
                                            role="menu" aria-orientation="vertical" aria-labelledby="options-menu-button"
                                            tabindex="-1">
                                            <div class="py-1" role="none">
                                                <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                                    tabindex="-1" id="options-menu-item-0">View profile</a>
                                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                                    tabindex="-1" id="options-menu-item-1">Settings</a>
                                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                                    tabindex="-1" id="options-menu-item-2">Notifications</a>
                                            </div>
                                            <div class="py-1" role="none">
                                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                                    tabindex="-1" id="options-menu-item-3">Get desktop app</a>
                                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                                    tabindex="-1" id="options-menu-item-4">Support</a>
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
                                        <a href="#"
                                            class="bg-gray-200 text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md"
                                            aria-current="page">
                                            <!--
                                    Heroicon name: outline/home
                    
                                    Current: "text-gray-500", Default: "text-gray-400 group-hover:text-gray-500"
                                    -->
                                            <svg class="text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                            </svg>
                                            Home
                                        </a>

                                        <a href="#"
                                            class="text-gray-700 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                            <!-- Heroicon name: outline/view-list -->
                                            <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                            </svg>
                                            My tasks
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
                                    <div class="mt-8">
                                        <!-- Secondary navigation -->
                                        <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider"
                                            id="teams-headline">
                                            Teams
                                        </h3>
                                        <div class="mt-1 space-y-1" role="group" aria-labelledby="teams-headline">
                                            <a href="#"
                                                class="group flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                                <span class="w-2.5 h-2.5 mr-4 bg-indigo-500 rounded-full"
                                                    aria-hidden="true"></span>
                                                <span class="truncate leading-5">
                                                    Engineering
                                                </span>
                                            </a>

                                            <a href="#"
                                                class="group flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                                <span class="w-2.5 h-2.5 mr-4 bg-green-500 rounded-full"
                                                    aria-hidden="true"></span>
                                                <span class="truncate leading-5">
                                                    Human Resources
                                                </span>
                                            </a>

                                            <a href="#"
                                                class="group flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                                <span class="w-2.5 h-2.5 mr-4 bg-yellow-500 rounded-full"
                                                    aria-hidden="true"></span>
                                                <span class="truncate leading-5">
                                                    Customer Success
                                                </span>
                                            </a>
                                        </div>
                                    </div>
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
                            class="px-4 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-purple-500 lg:hidden">
                            <span class="sr-only">Open sidebar</span>
                            <!-- Heroicon name: outline/menu-alt-1 -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h8m-8 6h16" />
                            </svg>
                        </button>
                        <div class="flex items-center mr-3">
                            @auth
                                <!-- Profile dropdown -->
                                <div class="relative">
                                    <div>
                                        <button type="button"
                                            class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"
                                            id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                            <span class="sr-only">Open user menu</span>
                                            <img class="h-8 w-8 rounded-full"
                                                src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixqx=nkXPoOrIl0&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                alt="">
                                        </button>
                                    </div>

                                    <!--
                                Dropdown menu, show/hide based on menu state.
                
                                Entering: "transition ease-out duration-100"
                                From: "transform opacity-0 scale-95"
                                To: "transform opacity-100 scale-100"
                                Leaving: "transition ease-in duration-75"
                                From: "transform opacity-100 scale-100"
                                To: "transform opacity-0 scale-95"
                            -->
                                    <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-200 focus:outline-none"
                                        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                        tabindex="-1">
                                        <div class="py-1" role="none">
                                            <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                            <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                                tabindex="-1" id="user-menu-item-0">View profile</a>
                                            <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                                tabindex="-1" id="user-menu-item-1">Settings</a>
                                            <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                                tabindex="-1" id="user-menu-item-2">Notifications</a>
                                        </div>
                                        <div class="py-1" role="none">
                                            <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                                tabindex="-1" id="user-menu-item-3">Get desktop app</a>
                                            <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                                tabindex="-1" id="user-menu-item-4">Support</a>
                                        </div>
                                        <div class="py-1" role="none">
                                            <a href="{{ route('logout') }}" class="text-gray-700 block px-4 py-2 text-sm"
                                                role="menuitem" tabindex="-1" id="user-menu-item-5" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">Logout</a>
                                        </div>
                                    </div>
                                </div>
                            @endauth

                            <div class="flex flex-row m-2">
                                <button type="button"
                                    class="leading-4 w-1/2 order-1 ml-3 inline-flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 sm:order-0 sm:ml-0">
                                    Login
                                </button>
                                <button type="button"
                                    class="leading-4 w-1/2 order-0 inline-flex justify-center items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-800 hover:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 sm:order-1 sm:ml-3">
                                    Register
                                </button>
                            </div>
                        </div>
                    </div>
                    <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">
                        @yield('content')
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
                                <span class="text-indigo-800 uppercase text-2xl font-bold">Tutorpedia</span>
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
            </main>    
        @endauth
    </div>
</body>

</html>
