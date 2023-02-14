<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\Cart\CartRepositoryInterface;
// use App\Repositories\Cart\CartModelRepository;

class CartController extends Controller
{

            public function index(CartRepositoryInterface $cart)
            {
                return view('front.pages.cart.index',compact('cart'));
            }

            public function create()
            {
                //
            }

            public function store(Request $request , CartRepositoryInterface $cart)
            {    
                try{
                    $product = Product::findOrFail($request->product_id);
                    $qty = 1;
                    $item = $cart->add($product ,$qty);
                    return redirect()->route('front.cart',compact('cart'))->with('success','Item Added Successfully.');
                } catch (Exception $e) {
                        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
                }
            }


            public function show($id)
            {
                $category = Category::findOrFail($id)->with('products');
                return view('front.pages.category.products');
            }


            public function edit($id)
            {
                //
            }

            public function update(Request $request, CartRepositoryInterface $cart)
            {
                try{
                    return dd($request->all());
                    $product = Product::findOrFail($request->product_id);
                    $qty = $request->qty;

                    $cart->update($product ,$qty)->with('update','Item updated Successfully.');
                                
                } catch (Exception $e) {
                        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
                }
            }

            public function destroy($id, CartRepositoryInterface $cart)
            {
                try{
                    $product = Product::findOrFail($id);
                    $cart->delete($product)->with('delete','Item has been deleted.');
                        
                } catch (Exception $e) {
                        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
                }
            }

            public function empty(CartRepositoryInterface $cart)
            {
                try{
                    $cart->empty()->with('delete','Your cart now is empty.');
                
                } catch (Exception $e) {
                    return redirect()->back()->withErrors(['error' => $e->getMessage()]);
                }
            }

            public function total(CartRepositoryInterface $cart)
            {
                try{
                $cart->total();
                            
                } catch (Exception $e) {
                        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
                }
            }

            public function increase(Request $request,$item_id,CartRepositoryInterface $cart)
            {  
                try{
                    $item = Cart::findOrFail($request->item_id);
                    $item->update([
                        'qty'=> $item->qty + 1 ,
                        $cart->total(),
                    ]);
                    //  return $item->increment('qty',1);
                    return response()->json($item->qty);
                
                } catch (Exception $e) {
                        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
                }
            }

            public function decrease(Request $request,$item_id,CartRepositoryInterface $cart)
            {
               try{
                    $item = Cart::findOrFail($request->item_id);
              
    
                        $item->update([
                            'qty'=> $item->qty - 1 ,
                              $cart->total(),
                        ]);
                    //  return $item->increment('qty',1);
                    return response()->json($item->qty);
                
                } catch (Exception $e) {
                        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
                }
            }

            // public function modifyQuantity(Request $request)
            // {  
            
            //     $item = Cart::findOrFail($request->item_id);
            //     if($request->qty < 0 ){
            //         return $item->update([
            //                 'qty'=> 0 ,
            //             ]);
            //     }
            //     return $item->update([
            //         'qty'=> $request->qty + 1,
            //     ]);
            //     return redirect()->route('front.cart');
            // }

}
