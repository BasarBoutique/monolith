<?php

namespace App\Providers;

use Google_AccessToken_Verify;
use Google_Client;
use Illuminate\Support\ServiceProvider;

class GoogleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Google_AccessToken_Verify::class, function ($app) {
            return new Google_AccessToken_Verify();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    public function provides()
    {
        return [Google_AccessToken_Verify::class];
    }
}
