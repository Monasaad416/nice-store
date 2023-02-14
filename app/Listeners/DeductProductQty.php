<?php

namespace App\Listeners;

use App\Models\Product;
use App\Facades\CartFacade;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeductProductQty
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle()
    {
        foreach(CartFacade::get() as $item) {
            Product::where('id' , $item->product->id)->update([
                'available_qty' => DB::raw(" available_qty  - {$item->qty} "),
            ]);
        }
    }
}
