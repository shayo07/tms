<?php

namespace App\Providers;

use App\Models\Attendance;
use App\Models\classes;
use App\Models\darasa;
use App\Models\Journal;
use App\Models\Journal_Report;
use App\Models\Lesson_dev;
use App\Models\Lesson_evaluation;
use App\Models\Lesson_plan;
use App\Models\Lessondevelopment;
use App\Models\logbook;
use App\Models\scheme;
use App\Models\School_Attendance;
use App\Models\School_journal;
use App\Models\schoollogbook;
use App\Models\schoolscheme;
use App\Models\student;
use App\Models\subject;
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

        Route::bind('scheme', function ($slug){
            return scheme::where('slug', $slug)->first();
        });

        Route::bind('lesson_development', function ($slug){
            return Lessondevelopment::where('slug', $slug)->first();
        });

        Route::bind('lesson_plan', function ($slug){
            return Lesson_plan::where('slug', $slug)->first();
        });

        Route::bind('lesson_dev', function ($slug){
            return Lesson_dev::where('slug', $slug)->first();
        });

        Route::bind('school_journal', function ($slug){
            return School_journal::where('slug', $slug)->first();
        });

        Route::bind('lesson_evaluation', function ($slug){
            return Lesson_evaluation::where('slug', $slug)->first();
        });

        Route::bind('journal', function ($slug){
            return Journal::where('slug', $slug)->first();
        });

        Route::bind('journal_report', function ($slug){
            return Journal_Report::where('slug', $slug)->first();
        });

        Route::bind('classroom', function ($slug){
            return classes::where('slug', $slug)->first();
        });

        Route::bind('school_attendance', function ($slug){
            return School_Attendance::where('slug', $slug)->first();
        });

        Route::bind('attendance', function ($slug){
        return Attendance::where('slug', $slug)->first();
         });

        Route::bind('subject', function ($slug){
            return subject::where('slug', $slug)->first();
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
