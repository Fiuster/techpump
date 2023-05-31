<?php

namespace App\Providers;

use App\Domain\Ports\ICartRepository;
use App\Domain\Ports\ICatalogRepository;
use App\Domain\Ports\IOrderRepository;
use App\Infrastructure\Adapters\CartRepository;
use App\Infrastructure\Adapters\CatalogRepository;
use App\Infrastructure\Adapters\OrderRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ICatalogRepository::class, CatalogRepository::class);

        $this->app->bind(ICartRepository::class, CartRepository::class);

        $this->app->bind(IOrderRepository::class, OrderRepository::class);
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
