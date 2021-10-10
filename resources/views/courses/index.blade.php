@extends('layouts.app')
@section('style-script')
    <script src="{{ asset('js/course/search-course.js') }}" defer></script>
@endsection
@section('content')
    <form class="space-y-8 divide-y divide-gray-200 px-4 py-2 sm:px-6 lg:px-8" action="{{ route('course.index') }}">
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
            <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Course
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Search your favourite course
                    </p>
                </div>
                <div class="space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="major" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Major
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <select id="major" name="major_id"
                                class="form-select max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                @foreach($majors as $major)
                                    <option value="{{ $major->id }}">{{ $major->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="course" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Course
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <select id="course" name="course_id"
                                class="form-select max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                @foreach($majors[0]->courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                @endforeach
                                <option value="">All</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-5">
            <div class="flex justify-end">
                <button type="button"
                    class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Cancel
                </button>
                <button type="submit"
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-800 hover:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700">
                    Search
                </button>
            </div>
        </div>
    </form>
@endsection
