@extends('layouts.app')
@section('content')
@include('components.navbar.admin')
<div class="px-4 mt-6 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center">
        <h2 class="text-gray-500 text-xs font-medium uppercase tracking-wide">Confirmed Tutor Schedule</h2>
        <div>
            <a href="{{ route('admin.class.pending') }}" class="cursor-pointer inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3">
                Pending Confirmed Class
            </a>
        </div>
    </div>
    @if(count($classes) == 0)
    <h1 class="flex-1 text-gray-500 text-2xl font-medium uppercase text-center my-20">You haven't make any class in current period</h1>
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

    @if(isset($classes))
        {{ $classes->withQueryString()->links() }}
    @endif
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
                        class="hidden md:table-cell px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <span class="lg:pl-2">Created By</span>
                    </th>
                    <th
                        class="hidden md:table-cell px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Checked at
                    </th>
                    <th
                        class="hidden md:table-cell px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Scheduled Date
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
                    <td class="hidden md:table-cell px-6 py-3 text-sm text-gray-500 text-right">
                        <span class="whitespace-nowrap line-clamp-3">{{ $class->user->name }}</span>
                    </td>
                    <td class="hidden md:table-cell px-6 py-3 whitespace-nowrap text-sm text-gray-500 text-right">
                        {{ date('M d, Y', strtotime($class->date))  }}
                    </td>
                    <td
                        class="hidden md:table-cell px-6 py-3 whitespace-nowrap text-sm text-gray-500 text-right">
                        {{ date('M d, Y', strtotime($class->date))  }}
                    </td>
                </tr>
                @endforeach

                <!-- More projects... -->
            </tbody>
        </table>
    </div>
    <div class="p-6 sm:p-8">
        @if(isset($classes))
            {{ $classes->withQueryString()->links() }}
        @endif
    </div>  
</div>
@endif

@endsection