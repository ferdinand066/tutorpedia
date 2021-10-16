<?php

namespace App\Providers;

use App\Models\Follower;
use App\Models\Major;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
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
        if (!$this->app->runningInConsole()) {
            view()->composer('*', function ($view) {
                $majors = Major::with(['courses' => function($query){
                    return $query->where('name', '!=', 'Other')->orderBy('name');
                }])->orderBy('name')->get();
                $view->with('majors', $majors);  
    
                if(Auth::user()){
                    $followers = Follower::where('student_id', Auth::user()->id)->limit(5)->get();
                    $view->with('followers', $followers);
                }
            });  
        }

    }
}
