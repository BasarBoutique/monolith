<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{

    protected $namespace = 'App\Http\Controllers';
    protected $apiV2Namespace = 'App\Http\Controllers\V2';

    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {

            /**
             * AUTH API V1
             */
            Route::prefix('api/v1/auth')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api/v1/auth.php'));

            /**
             * AUTH API V2
             */
            Route::prefix('api/v2/auth')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api/v2/auth.php'));


            /**
             * PERMISSIONS API V1
             */
            Route::prefix('api/v1/permissions')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api/v1/permissions.php'));


            /**
             * CATEGORIES API V1
             */
            Route::prefix('api/v1/categories')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api/v1/categories.php'));

            /**
             * COURSES API V1
             */
            Route::prefix('api/v1/courses')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api/v1/courses.php'));
            /**
             * COURSES API V1
             */
            Route::prefix('api/v1/lesson')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api/v1/lesson.php'));
            /**
             * COURSES API V1
             */
            Route::prefix('api/v1/comment')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api/v1/comment.php'));



            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));


        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
