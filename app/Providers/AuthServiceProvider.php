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

        Gate::define('manage-all',function($user){
            return $user->roles=="Administrator";
        });

        Gate::define('manage-keuangan',function($user){
            return $user->roles=="Kasir"||$user->roles=="Administrator";
        });

        Gate::define('manage-barang',function($user){
            return $user->roles=="Barang"||$user->roles=="Administrator";
        });
    }
}
