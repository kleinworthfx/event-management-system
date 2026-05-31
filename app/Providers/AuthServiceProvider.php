<?php

namespace App\Providers;

use App\Models\EventABC;
use App\Policies\EventPolicyABC;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        EventABC::class => EventPolicyABC::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
        
        // Define gates for role-based access
        Gate::define('admin-only', function ($user) {
            return $user->isAdmin();
        });
        
        Gate::define('organizer-only', function ($user) {
            return $user->isOrganizer() || $user->isAdmin();
        });
    }
}