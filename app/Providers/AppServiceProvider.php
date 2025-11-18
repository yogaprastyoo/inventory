<?php

namespace App\Providers;

use App\Models\Building;
use App\Observers\BuildingObserver;
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
        Building::observe(BuildingObserver::class);
    }
}
