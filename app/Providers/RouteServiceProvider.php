<?php

namespace App\Providers;

use App\Models\darasa;
use App\Models\logbook;
use App\Models\schoollogbook;
use App\Models\schoolscheme;
use App\Models\student;
use App\Models\term;
use App\Models\User;
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
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        Route::bind('system_user', function ($slug) {
            return User::where('slug', $slug)->first();
        });

        Route::bind('darasa', function ($slug){
            return darasa::where('slug', $slug)->first();
        });

        Route::bind('student', function ($slug){
            return student::where('slug', $slug)->first();
        });

        Route::bind('schoollogbook', function ($slug){
            return schoollogbook::where('slug', $slug)->first();
        });

        Route::bind('term', function ($slug){
            return term::where('slug', $slug)->first();
        });

        Route::bind('logbook', function ($slug){
            return logbook::where('slug', $slug)->first();
        });

        Route::bind('schoolscheme', function ($slug){
            return schoolscheme::where('slug', $slug)->first();
        });

        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
}
