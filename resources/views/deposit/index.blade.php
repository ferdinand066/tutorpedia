@extends('layouts.app')
@section('style-script')
    <script>
        $(function () {
            $('#deposit-btn').on('click', function(){
                $('#confirm-container').removeClass('hidden')
                $('#temp-container').addClass('hidden')
                let random_balance = parseInt($('#balance_temp').val()) + Math.floor(Math.random() * 100) + 1;
                $('#balance').val(random_balance)
            })
        });
    </script>
@endsection
@section('content')
<div class="space-y-8 divide-ypx-4 mt-6 sm:px-6 lg:px-8 leading-6">
    <div id="temp-container">
        <div class="space-y-8 divide-y sm:space-y-5">
            <div class="">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Deposit</h3>
                <p class="mt-1 text-sm text-gray-500">
                  Money are very important to join with our course.
                </p>
              </div>
            <div>
              <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                  <label for="balance_temp" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Money
                  </label>
                  <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <div class="max-w-lg flex rounded-md shadow-sm">
                      <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                        Rp.
                      </span>
                      <input type="number" min="1000" step="1000" name="balance_temp" id="balance_temp" autocomplete="balance" class="form-input flex-1 block w-full focus:ring-indigo-500 focus:border-indigo-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pt-5">
              <div class="flex justify-end">
                <button id="deposit-btn" type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-gray-400 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2">
                  Enter Deposit
                </button>
              </div>
          </div>
    </div>
    <form class="hidden space-y-8 sm:space-y-5" id="confirm-container" method="post" action="{{ route('deposit.store') }}">
        @csrf
        <div class="">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Deposit</h3>
            <p class="mt-1 text-sm text-gray-500">
                Please enter the appropriate value as listed below
            </p>
          </div>
          <div class="">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Bank Number : 0820274407</h3>
            <h3 class="text-lg font-medium leading-6 text-gray-900">Andre Setiawan Wijaya</h3>
          </div>
          <div>
          <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
              <label for="balance" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                Money
              </label>
              <div class="mt-1 sm:mt-0 sm:col-span-2">
                <div class="max-w-lg flex rounded-md shadow-sm">
                  <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                    Rp.
                  </span>
                  <input readonly type="number" min="1000" step="1000" name="balance" id="balance" autocomplete="balance" class="form-input flex-1 block w-full focus:ring-indigo-500 focus:border-indigo-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="pt-5">
            <div class="flex justify-end">
              <button id="deposit-btn" type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Confirm Deposit
              </button>
            </div>
        </div>
      </form>
</div>
@endsection