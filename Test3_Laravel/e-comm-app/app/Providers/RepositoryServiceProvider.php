<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\MainInterface;
use App\Repositories\{
    ProductRepository,
    CategoryRepository,
    CartItemsRepository
};




class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MainInterface::class, ProductRepository::class);
        $this->app->bind(MainInterface::class, CategoryRepository::class);
        $this->app->bind(MainInterface::class, CartItemsRepository::class);
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
