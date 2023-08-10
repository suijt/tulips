<?php

namespace App\Providers;

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
        $this->app->bind('App\Contracts\CountryInterface', 'App\Repositories\Country\CountryRepository');
        $this->app->bind('App\Contracts\CityInterface', 'App\Repositories\City\CityRepository');
        $this->app->bind('App\Contracts\PopulationInterface', 'App\Repositories\Population\PopulationRepository');
    }
}
