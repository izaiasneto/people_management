<?php

namespace App\Providers;

use App\Services\AddressService;
use App\Services\Interfaces\AddressServiceInterface;
use App\Services\Interfaces\PersonServiceInterface;
use App\Services\PersonService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PersonServiceInterface::class, PersonService::class);
        $this->app->bind(AddressServiceInterface::class, AddressService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
