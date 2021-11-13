@extends('layouts.app')
@section('content')
<div class="px-4 mt-6 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center">
        <h2 class="text-gray-500 text-xs font-medium uppercase tracking-wide">Transaction List</h2>
    </div>
    @if(count($transactions) == 0)
    <h1 class="flex-1 text-gray-500 text-2xl font-medium uppercase text-center my-20">No transaction in current period.</h1>
    @endif
</div>
@if(count($transactions) > 0)
{{--
<!-- Projects list (only on smallest breakpoint) -->
 <div class="mt-10 sm:hidden">
    <div class="flex flex-col gap-6 m-6">
      @foreach ($transations as $transaction)     
      <div class="flex flex-col bg-white rounded-lg shadow">
        <div class="flex flex-row px-4 items-center">
          <div class="w-16 h-16 p-0.5">
            <img src="{{ getPicture('profile', $deposit->user->photo_url) }}" alt="" class="rounded-full">
          </div>
          <div class="m-4 truncate flex flex-col leading-6" style="width: calc(100% - 4rem)">
            <span class="truncate font-semibold">{{ $deposit->user->name }}</span>
            <span class="truncate text-sm">{{ $deposit->user->email }}</span>
            <span class="truncate text-sm">{{ 'Rp. ' . number_format($deposit->balance,2,",","."); }}</span>
          </div>
        </div>
        <div class="flex flex-col leading-5">
            <form method="post" action="{{ route('admin.deposit.update', ['deposit' => $deposit]) }}" class="border-t flex flex-row gap-2 mt-2 justify-between space-x-2">
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
    @if(isset($deposits))
        {{ $deposits->withQueryString()->links() }}
    @endif
</div> --}}

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
                    Title
                  </th>
                  <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Type
                  </th>
                  <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Value
                  </th>
                  <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Created At
                  </th>
                </tr>
              </thead>
              <tbody>
                <!-- Odd row -->
                @foreach ($transactions as $key => $transaction)
                <tr class="{{ ($key % 2 == 0) ? 'bg-white' : 'bg-gray-50' }}">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                      {{ $transaction->title }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                      <div class="inline-flex {{ in_array($transaction->description, ['Deposit', 'Class Owner']) ? 'bg-green-100 text-green-500' : 'bg-red-100 text-red-500' }} px-3 py-1.5 text-xs rounded-full font-semibold">
                        {{ $transaction->description }}
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm {{ in_array($transaction->description, ['Deposit', 'Class Owner']) ? 'text-green-500' : 'text-red-500' }} text-center">
                      {{ (in_array($transaction->description, ['Deposit', 'Class Owner']) ? '' : '- ') . 'Rp. ' . number_format($transaction->balance,2,",","."); }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                      {{ date('M d, Y h:m:s', strtotime($transaction->created_at)) }}
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
  
    <div class="p-6 sm:p-8">
        @if(isset($transactions))
            {{ $transactions->withQueryString()->links() }}
        @endif
    </div>  
</div>
@endif
@endsection