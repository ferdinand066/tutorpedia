<div class="border-b border-gray-200 px-4 flex items-center justify-center lg:justify-between sm:px-6 lg:px-8 w-full">
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
</div>