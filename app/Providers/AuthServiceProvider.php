<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('view-logbook', function ($user, $logs){
            if ($user->is_admin == 1){
                return 1;
            }else{
                return $user->name === $logs->user->name;
            }

        });

        Gate::define('see-nav', function ($user){
            return $user->is_admin === 1;
        });

        Gate::define('edit-delete', function ($user){
            return $user->is_admin === 1;
        });

    }
}