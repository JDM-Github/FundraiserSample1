<?php

namespace App\Providers;

use Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('else', function () {
            return "<?php else: ?>";
        });

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
