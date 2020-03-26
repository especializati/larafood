<?php

namespace App\Providers;

use App\Models\{
    Category,
    Plan,
    Product,
    Tenant
};
use App\Observers\{
    CategoryObserver,
    PlanObserver,
    ProductObserver,
    TenantObserver
};
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Plan::observe(PlanObserver::class);
        Tenant::observe(TenantObserver::class);
        Category::observe(CategoryObserver::class);
        Product::observe(ProductObserver::class);
    }
}
