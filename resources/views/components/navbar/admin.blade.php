<div class="border-b border-gray-200 px-4 flex items-center justify-between sm:px-6 lg:px-8 w-full">
    <div class="flex flex-wrap">
        <div id="major-button" class="flex gap-5">
            <a href="{{ route('admin.class.pending') }}" class="border-transparent {{ request()->is('admin/class*') ? 
                'text-indigo-700 border-indigo-700' : 'text-gray-500 hover:border-indigo-500' }} cursor-pointer inline-flex items-center py-4 border-b-2 text-sm font-medium">
                Class
            </a>
            <a href="{{ route('admin.deposit.pending') }}" class="border-transparent {{ request()->is('admin/deposit*') ? 
                'text-indigo-700 border-indigo-700' : 'text-gray-500 hover:border-indigo-500' }} cursor-pointer inline-flex items-center py-4 border-b-2 text-sm font-medium">
                Deposit
            </a>
            <a href="{{ route('admin.withdraw.pending') }}" class="border-transparent {{ request()->is('admin/withdraw*') ? 
                'text-indigo-700 border-indigo-700' : 'text-gray-500 hover:border-indigo-500' }} cursor-pointer inline-flex items-center py-4 border-b-2 text-sm font-medium">
                Withdraw
            </a>
        </div>
    </div>
    <div class="hidden sm:block flex flex-wrap">
        <form action="{{ route('transaction.store') }}" method="post">
            @csrf
            <button type="submit" class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Generate Transaction
              </button>
        </form>
    </div>
</div>