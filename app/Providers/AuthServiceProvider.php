<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
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

        Gate::define('isAdmin', function (User $user) {
            return $user->role_id === 1;
        });
        Gate::define('isStaff', function (User $user) {
            return $user->role_id === 2;
        });
        Gate::define('isIntern', function (User $user) {
            return $user->role_id === 3;
        });
        Gate::define('isNotIntern', function (User $user) {
            return $user->role_id !== 3;
        });
    }
}
