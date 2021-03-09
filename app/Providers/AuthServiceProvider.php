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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('show-product',function ($user){
            return $user->hasAccess('read');
        });

        Gate::define('edit-product',function ($user){
            return $user->hasAccess('update');
        });

        Gate::define('delete-product',function ($user){
            return $user->hasAccess('delete');
        });

        Gate::define('add-product',function ($user){
            return $user->hasAccess('create');
        });
    }
}
