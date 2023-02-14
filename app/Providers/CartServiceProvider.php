<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Cart\CartRepositoryInterface;
use App\Repositories\Cart\CartModelRepository;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind('cart', function(){
        //     return new CartModelRepository();
        // });   // bind cart or CartRepositoryInterface::class

        $this->app->bind(CartRepositoryInterface::class , function(){
            return new CartModelRepository();
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
