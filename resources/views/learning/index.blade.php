@extends('layouts.app')
@php
    function getInitial($string){
        $list = explode(" ", $string);
        return strtoupper((count($list) > 1) ? $list[0][0] . $list[count($list) - 1][0] : $list[0][0]);
    }
@endphp

@section('content')
<!-- Pinned projects -->
<div class="px-4 mt-6 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center">
        <h2 class="text-gray-500 text-xs font-medium uppercase tracking-wide">Closest Learning Schedule</h2>
    </div>
    @if(count($classes) > 0)
    <ul class="grid grid-cols-1 gap-4 sm:gap-6 sm:grid-cols-2 xl:grid-cols-4 mt-3">
        @foreach ($classes as $key => $class)
        @if($key == 4)
            @break
        @endif
            <li class="relative col-span-1 flex shadow-sm rounded-md">
                <div
                    class="flex-shrink-0 flex items-center justify-center w-16 bg-pink-600 text-white text-sm font-medium rounded-l-md">
                    {{ getInitial($class->name) }}
                </div>
                <div
                    class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
                    <div class="flex-1 px-4 py-2 text-sm truncate leading-5">
                        <a href="{{ route('class.show', $class->id) }}" class="text-gray-900 font-medium hover:text-gray-600">
                            {{ $class->name }}
                        </a>
                        <p class="text-gray-500">{{ count($class->tutor_class_details) }} Members</p>
                    </div>
                    <div class="flex-shrink-0 pr-2">
                        <div>
                            <button type="button"
                                class="trigger-dropdown w-8 h-8 bg-white inline-flex items-center justify-center text-gray-400 rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"
                                id="pinned-project-options-menu-0-button" aria-expanded="false"
                                aria-haspopup="true">
                                <span class="sr-only">Open options</span>
                                <!-- Heroicon name: solid/dots-vertical -->
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                </svg>
                            </button>
                        </div>

                        <div class="hidden triggered z-10 mx-3 origin-top-right absolute right-10 top-3 w-48 mt-1 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-200 focus:outline-none"
                            role="menu" aria-orientation="vertical"
                            aria-labelledby="pinned-project-options-menu-0-button" tabindex="-1">
                            <div class="py-1" role="none">
                                <a href="{{ route('class.show', $class->id) }}" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-50" role="menuitem"
                                    tabindex="-1" id="pinned-project-options-menu-0-item-0">View</a>
                            </div>
                            <div class="py-1" role="none">
                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-50" role="menuitem"
                                    tabindex="-1" id="pinned-project-options-menu-0-item-1">Remove Class</a>
                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-50" role="menuitem"
                                    tabindex="-1" id="pinned-project-options-menu-0-item-2">Share</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
                    
            @endforeach
    </ul>
    @else
    <h1 class="flex-1 text-gray-500 text-2xl font-medium uppercase text-center my-20">You haven't join any class yet</h1>
    @endif
</div>

@if(count($classes) > 0)
<!-- Projects list (only on smallest breakpoint) -->
<div class="mt-10 sm:hidden">
    <div class="px-4 sm:px-6">
        <h2 class="text-gray-500 text-xs font-medium uppercase tracking-wide">Tutor Class</h2>
    </div>
    <ul class="mt-3 border-t border-gray-200 divide-y divide-gray-100">
        @foreach ($classes as $key => $class)
        <li>
            <a href="{{ route('class.show', $class->id) }}"
                class="group flex items-center justify-between px-4 py-4 hover:bg-gray-50 sm:px-6 leading-6">
                <span class="flex items-center truncate space-x-3">
                    <span class="w-2.5 h-2.5 flex-shrink-0 rounded-full bg-pink-600"
                        aria-hidden="true"></span>
                    <span class="font-medium truncate text-sm">
                        <span class="truncate w-1/2">{{ $class->name }}</span>
                        <span class="truncate font-normal text-gray-500 w-1/2">in {{ $class->course->name }}</span>
                    </span>
                </span>
                <!-- Heroicon name: solid/chevron-right -->
                <svg class="ml-4 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                    aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </a>
        </li>
        @endforeach
        <!-- More projects... -->
    </ul>
</div>

<!-- Projects table (small breakpoint and up) -->
<div class="hidden mt-8 sm:block">
    <div class="align-middle inline-block min-w-full border-b border-gray-200">
        <table class="min-w-full">
            <thead>
                <tr class="border-t border-gray-200">
                    <th
                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <span class="lg:pl-2">Class</span>
                    </th>
                    <th
                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Members
                    </th>
                    <th
                        class="hidden md:table-cell px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Scheduled Date
                    </th>
                    <th
                        class="pr-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @foreach ($classes as $class)
                <tr>
                    <td
                        class="px-6 py-3 max-w-0 w-full whitespace-nowrap text-sm font-medium text-gray-900 leading-6">
                        <div class="flex items-center space-x-3 lg:pl-2">
                            <div class="flex-shrink-0 w-2.5 h-2.5 rounded-full bg-pink-600"
                                aria-hidden="true"></div>
                            <a href="{{ route('class.show', $class->id) }}" class="truncate hover:text-gray-600">
                                <span>
                                    {{ $class->name }}
                                    <span class="text-gray-500 font-normal">in {{ $class->course->name }}</span>
                                </span>
                            </a>
                        </div>
                    </td>
                    <td class="px-6 py-3 text-sm text-gray-500 font-medium">
                        <div class="flex items-center space-x-2">
                            <div class="flex flex-shrink-0 -space-x-1">
                                @foreach ($class->tutor_class_details as $key => $details)
                                    @if($key == 4)
                                        @break
                                    @endif
                                    @if($details->user->photo_url !== null)
                                    <img class="max-w-none h-6 w-6 rounded-full ring-2 ring-white"
                                        src="{{ $details->user->photo_url }}"
                                        alt="{{ $details->user->name }}">  
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 rounded-full p-1 bg-gray-200 text-indigo-800" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                    </svg>
                                    @endif
                                @endforeach
                            </div>

                            <span class="flex-shrink-0 text-xs leading-5 font-medium">{{ (count($class->tutor_class_details) - 4 > 0) ? '+' . (count($class->tutor_class_details) - 4) : ''}}</span>
                        </div>
                    </td>
                    <td
                        class="hidden md:table-cell px-6 py-3 whitespace-nowrap text-sm text-gray-500 text-right">
                        {{ date('M d, Y', strtotime($class->date))  }}
                    </td>
                    <td class="pr-6">
                        <div class="relative flex justify-end items-center">
                            <div>
                                <button type="button"
                                    class="trigger-dropdown w-8 h-8 bg-white inline-flex items-center justify-center text-gray-400 rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"
                                    id="project-options-menu-0-button" aria-expanded="false"
                                    aria-haspopup="true">
                                    <span class="sr-only">Open options</span>
                                    <!-- Heroicon name: solid/dots-vertical -->
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path
                                            d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                    </svg>
                                </button>
                            </div>
                            <div class="triggered hidden mx-3 origin-top-right absolute right-7 top-0 w-48 mt-1 rounded-md shadow-lg z-10 bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-200 focus:outline-none"
                                role="menu" aria-orientation="vertical"
                                aria-labelledby="project-options-menu-0-button" tabindex="-1">
                                <div class="py-1" role="none">
                                    <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                    <a href="#"
                                        class="text-gray-700 group flex items-center px-4 py-2 text-sm"
                                        role="menuitem" tabindex="-1" id="project-options-menu-0-item-0">
                                        <!-- Heroicon name: solid/pencil-alt -->
                                        <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                            <path fill-rule="evenodd"
                                                d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Edit
                                    </a>
                                    <a href="#"
                                        class="text-gray-700 group flex items-center px-4 py-2 text-sm"
                                        role="menuitem" tabindex="-1" id="project-options-menu-0-item-1">
                                        <!-- Heroicon name: solid/duplicate -->
                                        <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M7 9a2 2 0 012-2h6a2 2 0 012 2v6a2 2 0 01-2 2H9a2 2 0 01-2-2V9z" />
                                            <path d="M5 3a2 2 0 00-2 2v6a2 2 0 002 2V5h8a2 2 0 00-2-2H5z" />
                                        </svg>
                                        Duplicate
                                    </a>
                                    <a href="#"
                                        class="text-gray-700 group flex items-center px-4 py-2 text-sm"
                                        role="menuitem" tabindex="-1" id="project-options-menu-0-item-2">
                                        <!-- Heroicon name: solid/user-add -->
                                        <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                                        </svg>
                                        Share
                                    </a>
                                </div>
                                <div class="py-1" role="none">
                                    <a href="#"
                                        class="text-gray-700 group flex items-center px-4 py-2 text-sm"
                                        role="menuitem" tabindex="-1" id="project-options-menu-0-item-3">
                                        <!-- Heroicon name: solid/trash -->
                                        <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Delete
                                    </a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach

                <!-- More projects... -->
            </tbody>
        </table>
    </div>
</div>
@endif
@endsection