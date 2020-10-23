<?php

namespace App\Providers;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
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

        $this->makeBinds();

        $this->routes(function () {
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));
        });
    }

    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60);
        });
    }

    private function makeBinds()
    {
        Route::bind('organization', function ($value) {
            return Organization::where('id', $value)->first() ?? abort(404);
        });

        Route::bind('user', function ($value) {
            return User::where('id', $value)->first() ?? abort(404);
        });

        Route::bind('profile', function ($value) {
            return User::where('id', $value)->first() ?? abort(404);
        });

        Route::bind('event', function ($value) {
            return User::where('id', $value)->first() ?? abort(404);
        });
    }
}
