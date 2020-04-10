<?php

namespace App\Providers;

use App\Repositories\Contracts\{
    TenantRepositoryInterface
};
use App\Repositories\{
    TenantRepository
};
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
            TenantRepositoryInterface::class,
            TenantRepository::class
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
