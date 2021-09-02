<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Interfaces\DeliveryRepositoryInterface', 
            'App\Repositories\DeliveryRepository',
        );
        $this->app->bind(
            'App\Repositories\Interfaces\DeliveryServiceRepositoryInterface', 
            'App\Repositories\DeliveryServiceRepository'
        );
        $this->app->bind(
            'App\Repositories\Interfaces\RouteRepositoryInterface', 
            'App\Repositories\RouteRepository'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
