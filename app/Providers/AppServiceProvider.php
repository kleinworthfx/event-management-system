<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\EventABC;
use App\Policies\EventPolicyABC;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }



// Inside the $policies array
protected $policies = [
    EventABC::class => EventPolicyABC::class,
];

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
