<?php

namespace App\Providers;

use App\Models\Major;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $majors = Major::with(['courses' => function($query){
            return $query->where('name', '!=', 'Other')->orderBy('name');
        }])->orderBy('name')->get();
        View::share('majors', $majors);  
    }
}
