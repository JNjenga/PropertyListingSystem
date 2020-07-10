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
    public function boot()
    {
        $this->registerPolicies();

        //gates
        Gate::define('adminAgentGate', function($user){
            return $user->hasAnyRoles(['admin', 'agent']);
        });

        Gate::define('adminGate', function($user){
            return $user->hasRole('admin');
        });

        Gate::define('agentGate', function($user){
            return $user->hasRole('agent');
        });
    }
}
