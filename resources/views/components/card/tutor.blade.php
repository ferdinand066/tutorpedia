<li class="bg-white rounded-lg shadow">
    <a href="{{ route('tutor.show', ['tutor' => $tutor_class]) }}" class="cursor-pointer col-span-1 divide-y divide-gray-200 leading-5">
        <div class="w-full relative">
            <img src="{{ $course->major->photo_url }}" class="h-60 w-full object-cover rounded-t" alt="">
            <div class="absolute bottom-2 right-2">
                <img class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixqx=nkXPoOrIl0&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
            </div>
        </div>
        <div class="w-full flex items-center justify-between p-3 space-x-6">
          <div class="flex-1">
            <div class="flex items-center space-x-3 h-18">
              <div class="text-gray-900 text-md font-bold line-clamp-3 leading-6">{{ $tutor_class->name }}</div>
            </div>
            <div>
                <div class="flex flex-row justify-between font-medium">
                    <p class="mt-1 text-gray-500 text-sm truncate">{{ date('l, d M Y', strtotime($tutor_class->date)) }}</p>
                    <p class="mt-1 text-gray-500 text-sm truncate">{{ 'Rp. ' . number_format($tutor_class->price,2,",",".") }}</p>
                </div>
                <p class="mt-1 text-gray-500 text-xs truncate">{{ $tutor_class->user->name }}</p>
                <p class="mt-1 text-gray-500 text-xs truncate">Current Person : 30</p>
            </div>
          </div>
        </div>
    </a>
</li>