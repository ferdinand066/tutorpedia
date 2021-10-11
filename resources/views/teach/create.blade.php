@extends('layouts.app')
@section('style-script')
  <script src="{{ asset('js/course/search-course.js') }}" defer></script>
  <script src="{{ asset('js/teach/requirement.js') }}" defer></script>
@endsection
@section('content')



<form class="space-y-6 px-4 mt-6 sm:px-6 lg:px-8 leading-6" id="create-class" method="post" action="{{ route('class.store') }}">
  @csrf
    <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
      <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
          <h3 class="text-lg font-medium leading-6 text-gray-900">General Information</h3>
          <p class="mt-1 text-sm text-gray-500">
            Write all about your class information generally.
          </p>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
          <div class="space-y-6">
            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3">
                <label for="link" class="block text-sm font-medium text-gray-700">
                  Tutor Class Link
                </label>
                <div class="mt-1 flex rounded-md shadow-sm">
                  <input required type="url" name="link" id="link" class="form-input focus:ring-indigo-800 focus:border-indigo-800 flex-1 block w-full rounded-none rounded-md sm:text-sm border-gray-300" placeholder="https://www.example.com">
                </div>
                <p class="mt-2 text-sm text-gray-500">
                    Please enter a valid tutor class link. Invalid links can result in a ban within a certain period
                </p>
              </div>
            </div>
            <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3">
                  <label for="name" class="block text-sm font-medium text-gray-700">
                    Class Title
                  </label>
                  <div class="mt-1 flex rounded-md shadow-sm">
                    <input required type="text" name="name" id="name" class="form-input focus:ring-indigo-800 focus:border-indigo-800 flex-1 block w-full rounded-none rounded-md sm:text-sm border-gray-300" placeholder="Introduction to Java">
                  </div>
                </div>
            </div>
            <div class="grid grid-cols-3 sm:grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <label for="major_id" class="block text-sm font-medium text-gray-700">Major</label>
                    <select id="major" name="major_id" class="form-select mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-800 focus:border-indigo-800 sm:text-sm">
                        @foreach ($majors as $major)
                            <option value="{{ $major->id }}">{{ $major->name }}</option>
                        @endforeach
                    </select>
                  </div>
      
                  <div class="col-span-6 sm:col-span-3">
                    <label for="course_id" class="block text-sm font-medium text-gray-700">Course</label>
                    <select id="course" name="course_id" class="form-select mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-800 focus:border-indigo-800 sm:text-sm">
                        @foreach ($majors[0]->courses as $course)
                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3">
                <label for="price" class="block text-sm font-medium text-gray-700">
                  Price
                </label>
                <div class="mt-1 flex rounded-md shadow-sm">
                  <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                    Rp.
                  </span>
                  <input required type="number" name="price" id="price" min="1000" step="1000" class="form-input focus:ring-indigo-800 focus:border-indigo-800 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="Introduction to Java">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
      <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
          <h3 class="text-lg font-medium leading-6 text-gray-900">Detail Information</h3>
          <p class="mt-1 text-sm text-gray-500">
            Detail information about and also schedule of your class
          </p>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
          <div>
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                <input required type="date" name="date" id="date" class="form-input mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>
  
              <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="start_time" class="block text-sm font-medium text-gray-700">Time Start</label>
                <input required type="time" name="start_time" id="start_time" class="form-input mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>
  
              <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="end_time" class="block text-sm font-medium text-gray-700">Time End</label>
                <input required type="time" name="end_time" id="end_time" class="form-input mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                <label for="minimum_person" class="block text-sm font-medium text-gray-700">Minimum Participant</label>
                <input required type="number" name="minimum_person" min="1" id="minimum_person" class="form-input mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                <label for="maximum_person" class="block text-sm font-medium text-gray-700">Maximum Participant</label>
                <input required type="number" name="maximum_person" min="0" id="maximum_person" class="form-input mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6">
                <label for="description" class="block text-sm font-medium text-gray-700">
                  Description
                </label>
                <div class="mt-1">
                  <textarea required id="description" name="description" rows="3" class="form-input shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Java is one of the most famous programming language.."></textarea>
                </div>
                <p class="mt-2 text-sm text-gray-500">
                  Brief description about your course.
                </p>
              </div>

              <div class="col-span-6 sm:col-span-6 lg:col-span-6">
                <label for="requirement_insert" class="block text-sm font-medium text-gray-700">Requirement</label>
                <div id="spec-container">
                  
                </div>
                <div class="flex flex-row">
                  <input type="text" name="requirement_insert" id="requirement_insert" class="form-input mt-1 focus:ring-indigo-800 focus:border-indigo-800 flex-1 block w-full rounded-none rounded-l-md sm:text-sm border-gray-300">
                  <button id="add-requirement" type="button" class="mt-1 bg-white py-2 px-4 border border-gray-300 rounded-r-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Insert
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <div class="flex justify-end">
      <button type="button" class="cancel-btn bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Cancel
      </button>
      <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Create class
      </button>
    </div>
</form>
  
@endsection