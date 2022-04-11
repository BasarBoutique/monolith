<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\CourseDetail;
use App\Models\Courses;
use App\Models\Lesson;
use App\Models\LessonDetail;
use App\Models\PermissionHierarchy;
use App\Models\PermissionUser;
use App\Models\User;
use App\Observers\Category\CategoryObserver;
use App\Observers\Comment\CommentObserver;
use App\Observers\Course\CourseDetailObserver;
use App\Observers\Course\CourseObserver;
use App\Observers\Lesson\LessonDetailObserver;
use App\Observers\Lesson\LessonObserver;
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

        // Prevent lazy loading models
        // Courses::preventLazyLoading(true);

        // Observers for models events
        User::observe(UserObserver::class);
        PermissionHierarchy::observe(RolObserver::class);
        PermissionUser::observe(UserRolObserver::class);
        Category::observe(CategoryObserver::class);
        Courses::observe(CourseObserver::class);
        CourseDetail::observe(CourseDetailObserver::class);
        LessonDetail::observe(LessonObserver::class);
        Comment::observe(CommentObserver::class);
        Lesson::observe(LessonDetailObserver::class);
    }
}
