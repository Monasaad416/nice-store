<?php

namespace App\Facades;
use Illuminate\Support\Facades\Facade;
use App\Repositories\Cart\CartRepositoryInterface;


class CartFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        // return 'cart';
        return CartRepositoryInterface::class;
    }
}
