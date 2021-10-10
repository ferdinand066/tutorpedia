@extends('layouts.app')
@section('content')
<div class="px-4 py-4 flex flex-col sm:flex-row sm:px-6 lg:px-8 gap-4">
    <div class="sm:w-2/3 flex flex-col gap-4">
        <div class="bg-white rounded shadow border-sm">
            <div class="w-full relative">
                <img src="{{ $class->course->major->photo_url }}" alt="" class="w-full h-48 sm:h-72 object-cover rounded-t">
                <div class="absolute bottom-2 right-2">
                    <img class="w-12 h-12 sm:w-16 sm:h-16 bg-white rounded-full flex-shrink-0" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixqx=nkXPoOrIl0&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                </div>
            </div>
            <div class="p-6 leading-8">
                <h1 class="text-lg sm:text-2xl font-bold">{{$class->name}}</h1>
                <div class="flex flex-row justify-between">
                    <a>by {{ $class->user->name }}</a>
                    <a class="inline-flex items-center px-2.5 rounded-full text-xs font-medium bg-green-100 text-green-800 capitalize leading-4">{{ $class->course->name }}</a>
                </div>
                <div class="flex flex-row justify-between items-center mt-3">
                    <h3 class="text-md sm:text-lg">{{ 'Rp. ' . number_format($class->price,2,",",".") }}</h3>
                    <form action="#" method="post">
                        <input type="hidden" name="class_id" id="class_id" value="{{ $class->id }}">
                        <button type="submit" class="leading-5 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Add to Cart
                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 -mr-1 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
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
                        {{ $class->start_time . ' - ' . $class->end_time }}
                      </dd>
                    </div>
                  </dl>
            </div>
        </div>

        <div class="bg-white rounded shadow border-sm">
            <div class="p-6 leading-8 flex flex-col">
                <h1 class="text-lg sm:text-xl font-bold">Description</h1>
                <span class="leading-7">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias est quisquam delectus nesciunt harum laboriosam doloremque modi magnam recusandae facere facilis error saepe, ut reprehenderit maxime sit libero vel qui.
                Aliquam esse officia cum aut, quas laborum velit est dolor dolorum exercitationem. Consequuntur est numquam nemo sapiente velit. Mollitia, in voluptas iure atque asperiores fugit perspiciatis fuga exercitationem? Vero, atque.
                Voluptatibus quos facere expedita ducimus dolorum nulla repellendus inventore et. Provident quidem inventore harum earum rerum dicta laboriosam deserunt laudantium eveniet quibusdam repudiandae odit, labore, distinctio, totam in nihil molestias.
                Fugiat porro dolore delectus natus nulla, saepe animi quibusdam et possimus laboriosam sunt velit a explicabo quod quia suscipit voluptate quas molestiae similique molestias sit corporis praesentium, error sed. Quas.
                Aliquam, ullam esse, est qui voluptate accusamus corporis totam nisi expedita optio, placeat quibusdam aperiam voluptatibus eaque a illo dolorem animi ut vel eum! Autem ullam porro sapiente quos adipisci.
                Sint deleniti nulla obcaecati inventore ex vitae dolores, quia tempora, quidem esse minus accusantium enim ipsam itaque hic porro! Ex hic debitis deleniti repellendus temporibus officia maiores quisquam nemo quidem.
                Non facilis, consectetur earum molestiae maxime nobis sapiente tempore unde nam aut quae totam qui quis quisquam rerum illum iure commodi numquam odio illo excepturi impedit dignissimos. Perspiciatis, voluptatibus explicabo.
                Neque modi magnam dolor molestiae, harum quo officiis quam ducimus quibusdam atque ipsa molestias praesentium mollitia recusandae expedita illo est? Molestias eius illum delectus nobis, asperiores excepturi dolorem facilis consequatur?
                Praesentium aperiam temporibus nemo ullam officiis architecto, nulla corporis dolorum nobis itaque harum, minus natus veritatis neque necessitatibus laborum incidunt impedit placeat fuga voluptas! Rem, cumque dolorum? Maxime, sunt libero!
                Provident velit eaque maxime distinctio, exercitationem sequi voluptatum facere cupiditate molestiae quibusdam ipsum iusto fugit? Eum vero iusto, temporibus porro labore voluptatibus, natus delectus neque fuga enim fugiat omnis impedit.</span>
            </div>
        </div>
    </div>
    <div class="sm:w-1/3 flex flex-col gap-4">
        <div class="bg-white rounded shadow p-4 border-sm flex flex-col gap-4 leading-5">
            <h1 class="text-lg sm:text-xl font-bold">Tutor Information</h1>
            <div class="flex justify-center">
                <img class="w-32 h-32 rounded-full shadow-xl" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixqx=nkXPoOrIl0&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
            </div>
            <div>
                <div class="text-sm font-medium text-gray-500 truncate">
                    Name
                </div>
                <div class="mt-1 text-xl font-semibold text-gray-900">
                    {{ $class->user->name }}
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
                    User Rating
                </div>
                <div class="mt-1 text-xl font-semibold text-gray-900">
                    {{ $class->user->rating ?? 0 . ' / 5' }}
                </div>
            </div>
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
@endsection