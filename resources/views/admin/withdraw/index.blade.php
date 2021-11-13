@extends('layouts.app')
@section('content')
@include('components.navbar.admin')
<div class="px-4 mt-6 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center">
        <h2 class="text-gray-500 text-xs font-medium uppercase tracking-wide">Pending Withdraw Schedule</h2>
    </div>
    @if(count($withdraws) == 0)
    <h1 class="flex-1 text-gray-500 text-2xl font-medium uppercase text-center my-20">No withdraw transaction in current period.</h1>
    @endif
</div>

@if(count($withdraws) > 0)
<!-- Projects list (only on smallest breakpoint) -->
 <div class="mt-10 sm:hidden">
    <div class="flex flex-col gap-6 m-6">
      @foreach ($withdraws as $withdraw)     
      <div class="flex flex-col bg-white rounded-lg shadow">
        <div class="flex flex-row px-4 items-center">
          <div class="w-16 h-16 p-0.5">
            <img src="{{ getPicture('profile', $withdraw->user->photo_url) }}" alt="" class="rounded-full">
          </div>
          <div class="m-4 truncate flex flex-col leading-6" style="width: calc(100% - 4rem)">
            <span class="truncate font-semibold">{{ $withdraw->user->name }}</span>
            <span class="truncate text-sm">{{ $withdraw->user->email }}</span>
            <span class="truncate text-sm">{{ 'Rp. ' . number_format($withdraw->balance,2,",","."); }}</span>
          </div>
        </div>
        <div class="flex flex-col leading-5">
          <div class="px-4 mb-2">
            <span class="truncate">{{ $withdraw->bank_username }}</span>
            <div class="flex flex-row justify-between">
              <span class="truncate">{{ $withdraw->bank_number }}</span>
              <span class="truncate">{{ $withdraw->bank_name }}</span>
            </div>
          </div>
            <form method="post" action="{{ route('admin.withdraw.update', ['withdraw' => $withdraw]) }}" class="border-t flex flex-row gap-2 mt-2 justify-between space-x-2">
              @method('patch')
              @csrf
              <button type="submit" name="status" value="1" class="w-1/2 inline-flex justify-center p-2 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-md focus:outline-none">
                <!-- Heroicon name: solid/mail -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1 text-green-500 hover:text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
              </button>
              <button type="submit" name="status" value="0" class="w-1/2 inline-flex justify-center p-2 items-center border border-transparent shadow-sm text-sm leading-4 font-medium rounded-md focus:outline-none">
                <!-- Heroicon name: solid/mail -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1 text-red-500 hover:text-red-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </form>
        </div>
      </div>
      @endforeach
    </div>
    @if(isset($withdraws))
        {{ $withdraws->withQueryString()->links() }}
    @endif
</div>

<!-- Projects table (small breakpoint and up) -->
<div class="hidden mt-8 sm:block">
<!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Name
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Bank Detail
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Nominal
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Requested At
                </th>
                <th scope="col" class="relative px-6 py-3">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($withdraws as $withdraw)     
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10">
                        @if($withdraw->user->photo_url !== null)
                        <img class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0"
                            src="{{ getPicture('profile', $withdraw->user->photo_url) }}"
                            alt="{{ $withdraw->user->name }}">
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 rounded-full p-1.5 bg-gray-200 text-indigo-800" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                        @endif
                        </div>
                        <div class="ml-4 leading-5">
                          <div class="text-sm font-medium text-gray-900">
                              {{ $withdraw->user->name }}
                          </div>
                          <div class="text-sm text-gray-500">
                              {{ $withdraw->user->email }}
                          </div>
                        </div>
                    </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="leading-5">
                        <div class="text-sm text-gray-900">
                            {{ $withdraw->bank_username }}
                        </div>
                        <div class="text-sm text-gray-500">
                            {{ $withdraw->bank_number . ' ( ' . $withdraw->bank_name . ' )'}}
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ 'Rp. ' . number_format($withdraw->balance,2,",","."); }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ date('M d, Y', strtotime($withdraw->created_at)) }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                      <form method="post" action="{{ route('admin.withdraw.update', ['withdraw' => $withdraw]) }}">
                        @method('patch')
                        @csrf
                        <button type="submit" value="1" name="status">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500 hover:text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                          </svg>
                        </button>
                        <button type="submit" value="0" name="status">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500 hover:text-red-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                          </svg>
                        </button>
                      </form>
                    </td>
                </tr>
                @endforeach
              <!-- More people... -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  
    <div class="p-6 sm:p-8">
        @if(isset($withdraws))
            {{ $withdraws->withQueryString()->links() }}
        @endif
    </div>  
</div>
@endif
@endsection