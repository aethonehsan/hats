<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Stancl\Tenancy\Events\TenantCreated;
use Stancl\Tenancy\Events\TenantUpdated;
use Stancl\Tenancy\Listeners\RunTenantMigrations;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Listen for tenant events and run migrations

    }
}
