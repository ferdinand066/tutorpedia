@extends('layouts.app')
@section('style-script')
    @php
    $socials = Auth::user()->social_media ?? ''; 
    $i = 0;
    @endphp
    <script>
        $(function () {
            let social = '<?php echo $socials; ?>';
            let i;
            if (social === ''){
                i = 1;
            } else {
                let result = JSON.parse(social)
                i = Object.keys(result).length
            }

            $('body').on('click', '.plus', function(){
                let data = `
                    <label id="label_${i}" class="flex text-sm font-medium text-gray-700 sm:mt-px sm:pt-2 justify-between">
                        <span></span>
                        <div class="flex flex-row space-x-2">
                            <svg id="min_${i}" xmlns="http://www.w3.org/2000/svg" class="min cursor-pointer h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="plus cursor-pointer h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </div>
                    </label>
                    <div id="key_${i}"  class="mt-1 sm:mt-0 sm:col-span-1">
                      <input type="text" name="social_media_key[]" placeholder="Social media name"
                        class="form-input max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div id="value_${i}"  class="mt-1 sm:mt-0 sm:col-span-1">
                        <input type="text" name="social_media_value[]" placeholder="Social media link"
                          class="form-input max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                    </div>`

                $('#social-media-container').append(data)
                i++
            })

            $('body').on('click', '.min', function(){
                let id = $(this).attr('id').split('_')[1]
                $(`#label_${id},#key_${id},#value_${id}`).remove()
            })

            $('#change-button').on('click', function(){
              $('#photo-url').trigger('click')
            })

            $('#photo-url').on('change', function(event){
              let url = URL.createObjectURL(event.target.files[0]);
              $('#image-container').children().get(0).remove()
              $('#image-container').prepend(
                `
                <img class="w-12 h-12 rounded-full shadow-xl" src="${url}" alt="">
                `
              )
            })
        });
    </script>
@endsection
@section('content')
<form class="space-y-6 px-4 mt-6 sm:px-6 lg:px-8 leading-6" method="post" action="{{ route('profile.update', ['profile' => Auth::user()]) }}" enctype="multipart/form-data">
  @method('patch')
  @csrf
  <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
    <div>
      <div>
        <h3 class="text-lg leading-6 font-medium text-gray-900">
          Profile
        </h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">
          This information will be displayed publicly so be careful what you share.
        </p>
      </div>

      <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-center sm:border-t sm:border-gray-200 sm:pt-5">
            <label for="photo" class="block text-sm font-medium text-gray-700">
              Photo
            </label>
            <div class="mt-1 sm:mt-0 sm:col-span-2">
              <div class="flex items-center" id="image-container">
                @if(Auth::user()->photo_url !== null)
                    <img class="w-12 h-12 rounded-full shadow-xl" src="{{ getPicture('profile', Auth::user()->photo_url) }}" alt="">
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 rounded-full p-3 bg-gray-200 text-indigo-800" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                    </svg>
                @endif
                <button type="button" id="change-button" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Change
                </button>
              </div>
            </div>
          </div>

          <input type="file" name="photo_url" id="photo-url" class="hidden" accept="image/*">
  
        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
            <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                Full Name
            </label>
            <div class="mt-1 sm:mt-0 sm:col-span-2">
              <input type="text" name="name" id="name"
                value="{{ old('name') ?? Auth::user()->name }}"
                class="form-input max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
            </div>
          </div>
  
          <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
            <label for="email" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
              Email address
            </label>
            <div class="mt-1 sm:mt-0 sm:col-span-2">
              <input type="email" readonly disabled 
              value="{{ old('email') ?? Auth::user()->email }}"
              class="form-input max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
            </div>
          </div>
          
          <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
            <label for="phone_number" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                Phone Number
            </label>
            <div class="mt-1 sm:mt-0 sm:col-span-2">
              <input type="text" name="phone_number" id="phone_number"
                value="{{ old('phone_number') ?? Auth::user()->phone_number }}"
                class="form-input max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
            </div>
          </div>

          <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
            <label for="university_id" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
              University
            </label>
            <div class="mt-1 sm:mt-0 sm:col-span-2">
              <select id="university_id" name="university_id" class="form-select max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                @foreach ($universities as $university)
                    <option value="{{ $university->id }}">{{ $university->name }}</option>
                @endforeach
                <option value="{{ $other->id }}">{{ $other->name }}</option>
              </select>
            </div>
          </div>
        
          <div id="social-media-container" class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
            @php
                 $socials = Auth::user()->social_media ?? ''; 
                 $i = 0;
            @endphp
            @if($socials !== '')
                @php
                    $socials = json_decode($socials);
                @endphp
                @foreach ($socials as $key => $social)
                    <label id="label_{{$i}}" class="flex text-sm font-medium text-gray-700 sm:mt-px sm:pt-2 justify-between">
                        <span>{{ (!$i) ? 'Social Media' : ''}}</span>
                        <div class="flex flex-row space-x-2">
                            @if($i)
                            <svg id="min_{{ $i }}" xmlns="http://www.w3.org/2000/svg" class="min cursor-pointer h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                            </svg>
                            @endif
                            <svg xmlns="http://www.w3.org/2000/svg" class="plus cursor-pointer h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </div>
                    </label>
                    <div id="key_{{$i}}"  class="mt-1 sm:mt-0 sm:col-span-1">
                      <input type="text" name="social_media_key[]" placeholder="Social media name"
                        value="{{ $key }}"
                        class="form-input max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div id="value_{{$i}}"  class="mt-1 sm:mt-0 sm:col-span-1">
                        <input type="text" name="social_media_value[]" placeholder="Social media link"
                          value="{{ $social }}"
                          class="form-input max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                    </div>
                @php
                    $i++;
                @endphp
                @endforeach
            @else
                <label id="label_0" class="flex text-sm font-medium text-gray-700 sm:mt-px sm:pt-2 justify-between">
                    <span>Social Media</span>
                    <div class="flex flex-row space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="plus cursor-pointer h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                    </div>
                </label>
                <div id="key_0"  class="mt-1 sm:mt-0 sm:col-span-1">
                <input type="text" name="social_media_key[]" placeholder="Social media name"
                    class="form-input max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                </div>
                <div id="value_0"  class="mt-1 sm:mt-0 sm:col-span-1">
                    <input type="text" name="social_media_value[]" placeholder="Social media link"
                    class="form-input max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                </div>      
            @endif
        </div>



        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <label for="about" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
            About
          </label>
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <textarea id="about" name="about" rows="3" class="form-input max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">{{ old('about') ?? Auth::user()->about }}</textarea>
            <p class="mt-2 text-sm text-gray-500">Write a few sentences about yourself.</p>
          </div>
        </div>

        <div class="pt-5">
            <div class="flex justify-end">
              <button type="button" class="cancel-btn bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Cancel
              </button>
              <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
              </button>
            </div>
          </div>
  
</form>

@endsection