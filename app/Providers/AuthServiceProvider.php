<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
            // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot() {

        $this->registerPolicies();

        /** "Eredita" le funzioni del controller di livello più alto 
         * in modo da aumentare il riutilizzo del codice
         * (es. admin@modificaStaff usa user@modificaProfilo) */
        Gate::define('isUser', function ($user) {
            return $user->hasRole('user');
        });

        Gate::define('isStaff', function ($user) {
            return $user->hasRole('staff');
        });

        Gate::define('isAdmin', function ($user) {
            return $user->hasRole('admin');   
        });

        Gate::define('showDiscount', function ($user) {
            return $user->hasRole(['user','staff','admin']);
        });
    }
}
