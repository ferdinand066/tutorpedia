<div class="border-b border-gray-200 px-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
    <div class="flex flex-wrap hidden md:block">
        <div id="major-button" class="flex gap-5">
            <a href="{{ route('admin.class.pending') }}" class="border-transparent {{ request()->is('admin/class*') ? 
                'text-indigo-700 border-indigo-700' : 'text-gray-500 hover:text-indigo-300 hover:border-indigo-300' }} cursor-pointer inline-flex items-center py-4 border-b-2 text-sm font-medium">
                Class
            </a>
            <a href="{{ route('admin.class.pending') }}" class="border-transparent {{ request()->is('admin/payment*') ? 
                'text-indigo-700 border-indigo-700' : 'text-gray-500 hover:border-gray-500' }} cursor-pointer inline-flex items-center py-4 border-b-2 text-sm font-medium">
                Payment
            </a>
        </div>
    </div>
</div>