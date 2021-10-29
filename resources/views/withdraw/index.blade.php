@extends('layouts.app')
@section('style-script')
    <script>
        $(function () {
            $('#deposit-btn').on('click', function(){
                $('#confirm-container').removeClass('hidden')
                $('#temp-container').addClass('hidden')
                let random_balance = parseInt($('#balance_temp').val())
                let username = $('#temp_bank_name').val()
                let number = $('#temp_bank_number').val()
                let bank = $('#temp_bank').val()
                $('#balance').val(random_balance)
                $('#bank_username').val(username)
                $('#bank_number').val(number)
                $('#new_balance').val(random_balance * 8 / 10)
                $('#name').val(bank)
            })
        });
    </script>
@endsection
@section('content')
<div class="space-y-8 divide-ypx-4 mt-6 sm:px-6 lg:px-8 leading-6">
    <div id="temp-container">
        <div class="space-y-8 divide-y sm:space-y-5">
            <div class="">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Withdraw</h3>
                <p class="mt-1 text-sm text-gray-500">
                  Take your profit from making tutor with us.
                  You'll get 80% of your total withdraw amount.
                </p>
              </div>
            <div>
              <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                  <label for="temp_bank_number" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Bank Number
                  </label>
                  <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <div class="max-w-lg flex rounded-md shadow-sm">
                      <input type="text" name="temp_bank_number" id="temp_bank_number" autocomplete="balance" class="form-input flex-1 block w-full focus:ring-indigo-500 focus:border-indigo-500 min-w-0 rounded-none rounded-md sm:text-sm border-gray-300">
                    </div>
                  </div>
                </div>
              </div>
              <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                  <label for="temp_bank" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Bank Name
                  </label>
                  <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <div class="max-w-lg flex rounded-md shadow-sm">
                      <input type="text" name="temp_bank" id="temp_bank" class="form-input flex-1 block w-full focus:ring-indigo-500 focus:border-indigo-500 min-w-0 rounded-none rounded-md sm:text-sm border-gray-300">
                    </div>
                  </div>
                </div>
              </div>
              <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                  <label for="temp_bank_name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Bank Account Name
                  </label>
                  <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <div class="max-w-lg flex rounded-md shadow-sm">
                      <input type="text" name="temp_bank_name" id="temp_bank_name" class="form-input flex-1 block w-full focus:ring-indigo-500 focus:border-indigo-500 min-w-0 rounded-none rounded-md sm:text-sm border-gray-300">
                    </div>
                    <p class="mt-2 text-xs text-gray-500">Please write the same name as Bank Number Owner</p>
                  </div>
                </div>
              </div>
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
                  Withdraw
                </button>
              </div>
          </div>
    </div>
    <form class="hidden space-y-8 sm:space-y-5" id="confirm-container" method="post" action="{{ route('withdraw.store') }}">
        @csrf
        <div class="">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Withdraw</h3>
            <p class="mt-1 text-sm text-gray-500">
              Take your profit from making tutor with us.
              You'll get 80% of your total withdraw amount.
            </p>
          </div>
          <div>
          <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
              <label for="bank_number" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                Bank Number
              </label>
              <div class="mt-1 sm:mt-0 sm:col-span-2">
                <div class="max-w-lg flex rounded-md shadow-sm">
                  <input readonly type="text" name="bank_number" id="bank_number" class="form-input flex-1 block w-full focus:ring-indigo-500 focus:border-indigo-500 min-w-0 rounded-none rounded-md sm:text-sm border-gray-300">
                </div>
              </div>
            </div>
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
              <label for="bank_username" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                Bank Account Name
              </label>
              <div class="mt-1 sm:mt-0 sm:col-span-2">
                <div class="max-w-lg flex rounded-md shadow-sm">
                  <input readonly type="text" name="bank_account_name" id="bank_username" class="form-input flex-1 block w-full focus:ring-indigo-500 focus:border-indigo-500 min-w-0 rounded-none rounded-md sm:text-sm border-gray-300">
                </div>
              </div>
            </div>
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
              <label for="bank_name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                Bank Name
              </label>
              <div class="mt-1 sm:mt-0 sm:col-span-2">
                <div class="max-w-lg flex rounded-md shadow-sm">
                  <input readonly type="text" name="bank_name" id="name" class="form-input flex-1 block w-full focus:ring-indigo-500 focus:border-indigo-500 min-w-0 rounded-none rounded-md sm:text-sm border-gray-300">
                </div>
              </div>
            </div>
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
              <label for="balance" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                Money
              </label>
              <div class="mt-1 sm:mt-0 sm:col-span-2">
                <div class="max-w-lg flex rounded-md shadow-sm">
                  <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                    Rp.
                  </span>
                  <input readonly type="number" min="1000" step="1000" name="nominal" id="balance" class="form-input flex-1 block w-full focus:ring-indigo-500 focus:border-indigo-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                </div>
              </div>
            </div>
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
              <label for="new_balance" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                You will get
              </label>
              <div class="mt-1 sm:mt-0 sm:col-span-2">
                <div class="max-w-lg flex rounded-md shadow-sm">
                  <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                    Rp.
                  </span>
                  <input readonly type="number" id="new_balance" class="form-input flex-1 block w-full focus:ring-indigo-500 focus:border-indigo-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="pt-5">
            <div class="flex justify-end">
              <button id="deposit-btn" type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Confirm Withdraw
              </button>
            </div>
        </div>
      </form>
</div>
@endsection