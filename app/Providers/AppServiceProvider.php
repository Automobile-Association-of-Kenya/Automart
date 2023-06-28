<?php

namespace App\Providers;

use App\Models\Maillist;
use App\Models\Vehicle;
use App\Observers\MaillistObserver;
use App\Observers\VehicleObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

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
        Vehicle::observe(VehicleObserver::class);
        Maillist::observe(MaillistObserver::class);
        Paginator::useBootstrap();
    }
}
