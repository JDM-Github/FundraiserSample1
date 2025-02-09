<?php

namespace App\Providers;

use App\Repositories\UsersRepository;
use App\Services\UsersService;
use Illuminate\Support\ServiceProvider;
use App\Repositories\NewsRepository;
use App\Services\NewsService;
use Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(NewsRepository::class, function ($app) {
            return new NewsRepository();
        });
        
        $this->app->bind(NewsService::class, function ($app) {
            return new NewsService($app->make(NewsRepository::class));
        });


        $this->app->bind(UsersRepository::class, function ($app) {
            return new UsersRepository();
        });

        $this->app->bind(UsersService::class, function ($app) {
            return new UsersService($app->make(UsersRepository::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // ADMIN
        Blade::directive('admin', function () {
            return "<?php if(auth()->check() && (auth()->user()->hasRole('admin') || auth()->user()->hasRole('super_admin'))): ?>";
        });
        Blade::directive('endadmin', function () {
            return "<?php endif; ?>";
        });

        // ADMIN ONLY
        Blade::directive('adminonly', function () {
            return "<?php if(auth()->check() && (auth()->user()->hasRole('admin'))): ?>";
        });
        Blade::directive('endadminonly', function () {
            return "<?php endif; ?>";
        });

        // SUPER ADMIN ONLY
        Blade::directive('superadmin', function () {
            return "<?php if(auth()->check() && auth()->user()->hasRole('super_admin')): ?>";
        });
        Blade::directive('endsuperadmin', function () {
            return "<?php endif; ?>";
        });


        // FUNDRAISER
        Blade::directive('fundraiser', function () {
            return "<?php if(auth()->check() && auth()->user()->hasRole('fundraiser')): ?>";
        });
        Blade::directive('endfundraiser', function () {
            return "<?php endif; ?>";
        });

        // GUEST
        Blade::directive('guest', function () {
            return "<?php if(auth()->guest()): ?>";
        });
        Blade::directive('endguest', function () {
            return "<?php endif; ?>";
        });
    }
}
