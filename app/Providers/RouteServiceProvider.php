<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    // public const PAGINATION_COUNT=  20 ;
    public const HOME = '/site';
    public const ADMIN_HOME = 'admin/dashboard';
    protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            // this section is Special for APIS only
            // defualt API routes file
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/APIs/api.php'));
            // Vendors API
            Route::middleware('api')
                ->namespace($this->namespace . '\\Admin\\Apis')
                ->prefix('api/admin/vendors')
                ->group(base_path('routes/APIs/vendor.php'));

            // end section which Special for APIS only




            // this section is Special for WEB only
            // defualt WEB routes file
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            // admin routes
            route::middleware('web')
                ->prefix('admin')
                ->namespace($this->namespace . '\\Auth\\Admin')
                ->group(base_path('routes/admin.php'));


            // languages routes
            route::middleware('web')
                ->name('languages.')
                ->prefix('admin/languages')
                ->namespace($this->namespace . '\\Admin')
                ->group(base_path('routes/language.php'));


            // Main Category routes
            route::middleware('web')
                ->name('MainCategory.')
                ->prefix('admin/MainCategory')
                ->namespace($this->namespace . '\\Admin')
                ->group(base_path('routes/MainCategory.php'));

            // Vendors routes
            route::middleware('web')
                // ->name('vendor.')
                ->prefix('admin')
                ->namespace($this->namespace . '\\Admin')
                ->group(base_path('routes/vendor.php'));
        });
    }
}
