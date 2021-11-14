<?php

namespace App\Providers;

use App\Models\Rating;
use App\Models\TutorClass;
use App\Models\TutorClassDetail;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-data', function (User $user) {
            return $user->role == 'Admin';
        });

        Gate::define('rating', function (User $user, TutorClass $class) {
            $rating = TutorClassDetail::where(
                [
                    ['tutor_class_id', $class->id],
                    ['user_id', $user->id]
                ])->first();
            return ($rating) ? true : false;
        });

        Gate::define('update-self-data', function(User $user, $data){
            return $data->user_id == $user->id;
        });
    }
}
