<?php

namespace App\Providers;


use App\Models\User;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();

//        Gate::define('moderator', function (User $user) {
//            return $user->isModerator();
//        });
        Gate::define('administrator', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });



        // TODO RM
        Gate::define('premium', function (User $user) {
            return $user->isPremium();
        });
        Gate::define('user', function (User $user) {
            return $user->isUser();
        });
    }
}
