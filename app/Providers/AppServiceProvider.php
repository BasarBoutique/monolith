<?php

namespace App\Providers;

use App\Models\PermissionHierarchy;
use App\Models\PermissionUser;
use App\Models\User;
use App\Observers\Permission\RolObserver;
use App\Observers\Permission\UserRolObserver;
use App\Observers\UserObserver;
use Illuminate\Routing\UrlGenerator;
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
        if(config('app.redirect_https')) {
            $this->app['request']->server->set('HTTPS', true);
        }

        $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
        $this->app->register(TelescopeServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        if(config('app.redirect_https')) {
            $url->formatScheme('https://');
        }

        // Observers for models events
        User::observe(UserObserver::class);
        PermissionHierarchy::observe(RolObserver::class);
        PermissionUser::observe(UserRolObserver::class);
    }
}
