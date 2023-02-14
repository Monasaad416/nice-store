<?php

namespace App\Repositories\Cart;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


use App\Repositories\Cart\CartRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class CartModelRepository implements CartRepositoryInterface
{

    protected $items;

    public function __construct()
    {
        $this->items = collect([]);
    }


    public function get() : Collection
    {
        //global scope used here to get cookie_id(carts for user only)
        if(!$this->items->count()) {
            return Cart::with('product')->get();
        }

        return $this->items;
    }

    public function add(Product $product , $qty =1)
    {

        $item = Cart::where('product_id',$product->id)->first();
        if(!$item){
            if($product->available_qty > 0 ) {
                $cart = Cart::create([
                    'cookie_id' =>  Cart::getCookieId(),
                    'client_id' => Auth::user()->id ?? null ,
                    'product_id' => $product->id,
                    'qty' => 1,
                ]);

                $this->get()->push($cart);
                return $cart;
            }
            else {
                return redirect()->route('front.index')->with('unvailable', 'Product is unvailable now.');
            }
        }
        return $item->increment('qty',1);
    }

    public function update($id, $qty)
    {
        $cart = Cart::where('product_id' , $id)
        ->update([
            'qty' => $qty,
        ]);

    }

    public function delete($id)
    {
        $cart = Cart::where('product_id' , $id)
           ->delete();
    }

    public function empty()
    {
        $cart = Cart::query()->delete();
    }

    public function total() : float
    {
        // return (float) Cart::join('Products','products.id','carts.product_id')
        //     ->selectRaw('sum(products.price * carts.qty) as total')
        //     ->value('total');

        return $this->get()->sum( function($row){
            return $row->qty * $row->product->price;
        });
    }

}
