<?php

namespace App\Providers;

use App\Application\Adapters\CartService;
use App\Application\Adapters\CatalogService;
use App\Application\Adapters\OrderService;
use App\Application\Ports\ICartService;
use App\Application\Ports\ICatalogService;
use App\Application\Ports\IOrderService;
use App\Domain\Ports\ICartRepository;
use App\Domain\Ports\ICatalogRepository;
use App\Domain\Ports\IOrderRepository;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class ServicesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton(ICatalogService::class, function (Application $app) {
            return new CatalogService($app->make(ICatalogRepository::class));
        });

        $this->app->singleton(ICartService::class, function (Application $app) {
            return new CartService($app->make(ICartRepository::class));
        });

        $this->app->singleton(IOrderService::class, function (Application $app) {
            return new OrderService($app->make(IOrderRepository::class));
        });
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
