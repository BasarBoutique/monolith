<?php

namespace App\Providers;

use App\Models\Permission;
use App\Models\User;
use App\Policies\PermissionPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
use Illuminate\Auth\Access\Response;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Permission::class => PermissionPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        // Register policies
        $this->registerPolicies();

        // Register Guards
        Gate::define("isAdmin", function(User $user) {
            return $user->isAdmin();
        });


        Gate::define("create-permission", [PermissionPolicy::class, 'create']);

        // Passport routes
        Passport::routes();

        // Caching user
        Auth::provider('cache-user', function() {
            return resolve(CacheUserProvider::class);
        });
    }
}
