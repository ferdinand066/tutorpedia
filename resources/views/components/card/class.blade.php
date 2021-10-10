<li class="bg-white rounded-lg shadow">
    <a href="{{ route('class.show', ['class' => $tutor_class]) }}" class="cursor-pointer leading-5">
        <div class="w-full relative">
            <img src="{{ $course->major->photo_url }}" class="h-60 w-full object-cover rounded-t" alt="">
            <div class="absolute bottom-2 right-2">
                <img class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0" src="{{ $tutor_class->user->photo_url }}" alt="">
            </div>
        </div>
        <div class="w-full flex items-center justify-between p-3 space-x-6">
          <div class="flex-1 w-full">
            <div class="flex items-center space-x-3 h-18">
              <div class="text-gray-900 text-md font-bold line-clamp-3 leading-6">{{ $tutor_class->name }}</div>
            </div>
            <div>
                <div class="flex flex-row justify-between font-medium">
                    <p class="mt-1 text-gray-500 text-sm truncate">{{ date('l, d M Y', strtotime($tutor_class->date)) }}</p>
                    <p class="mt-1 text-gray-500 text-sm truncate">{{ 'Rp. ' . number_format($tutor_class->price,2,",",".") }}</p>
                </div>
                <div class="flex flex-row justify-between gap-2 w-full">
                  <p class="mt-1 text-gray-500 text-xs truncate w-1/2">{{ $tutor_class->user->name }}</p>
                  <p class="mt-1 text-gray-500 text-xs truncate w-1/2 text-right">{{ $tutor_class->course->name }}</p>
                </div>
                
            </div>
            <div class="flex flex-row w-full">
              <p class="mt-1 text-gray-500 text-xs truncate">Participant Range : {{ $tutor_class->minimum_person . ' - ' . $tutor_class->maximum_person }}</p>
            </div>
            <div class="flex flex-row w-full">
              <p class="mt-1 text-gray-500 text-xs truncate">Current Person : {{ count($tutor_class->tutor_class_details) }}</p>
            </div>
          </div>
        </div>
    </a>
</li>