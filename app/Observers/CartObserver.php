<?php

namespace App\Observers;

use App\Models\Cart;
use Illuminate\Support\Str;

class CartObserver
{

    public function creating(Cart $cart)
    {
        $cart->id = Str::uuid();
        $cart->cookie_id = Cart::getCookieId();
    }

    /**
     * Handle the cart "updated" event.
     *
     * @param  \App\Models\cart  $cart
     * @return void
     */
    public function updated(Cart $cart)
    {
        //
    }

    /**
     * Handle the cart "deleted" event.
     *
     * @param  \App\Models\cart  $cart
     * @return void
     */
    public function deleted(Cart $cart)
    {
        //
    }

    /**
     * Handle the cart "restored" event.
     *
     * @param  \App\Models\cart  $cart
     * @return void
     */
    public function restored(Cart $cart)
    {
        //
    }

    /**
     * Handle the cart "force deleted" event.
     *
     * @param  \App\Models\cart  $cart
     * @return void
     */
    public function forceDeleted(Cart $cart)
    {
        //
    }
}
