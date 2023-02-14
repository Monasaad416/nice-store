<?php

namespace App\Http\Controllers\Front;

use Exception;
use App\Models\Order;
use App\Models\OrderAddress;
use App\Models\cart;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\Cart\CartRepositoryInterface;
use Throwable;
use App\Models\City;
use App\Events\OrderCreated;

class CheckoutController extends Controller
{

        public function create(CartRepositoryInterface $cart)
        {
            try {
                return view('front.pages.checkout.create',compact('cart'));
            } catch (Exception $e) {
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
        }
       

        public function getCities($governorate_id)
        {
            try {
                $cities = City::where('governorate_id',$governorate_id)->pluck('name','id');
                return response()->json($cities);
            } catch (Exception $e) {
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
        }


        public function store(Request $request , CartRepositoryInterface $cart)
        {
        //return $request->all();
            try {
                //start transaction
                DB::beginTransaction();

                // select cart items by store 
                $storeCartItems = $cart->get()->groupBy('product.store_id');
 
                foreach($storeCartItems as $store_id => $storeItems) {
                    //inserting in orders table
                    $request->validate([
                        // 'client_id'=>'nullable|exists:clients,id' ,
                        // 'email'=>'required|string|email',
                        // 'phone'=>'required|string',
                        // 'payment_method_id'=>'required|exists:payment_methods,id',
                    ]);

                    $order = Order::create([
                        'store_id'=>  $store_id,
                        'client_id'=> Auth()->user()->name ?? null,
                        // 'email'=>  $request->email,
                        // 'phone'=>  $request->phone,
                        'payment_method_id'=>  1,
                    ]);

                    //inserting in order_details table
                    $price = 0;
                    foreach($storeItems as $item){
                        $order->products()->attach($item->product->id,[
                            'product_name' => $item->product->name,
                            'product_price' => $item->product->price,
                            'qty' => $item->qty
                        ]);
                        
                        $settings = Setting::first();
                        $price += ($item->product->price * $item->qty);
                        $shippinFees = $settings->shipping_fees;
                        $taxes = $price * ($settings->taxes) / 100 ;
                        $total_price = $price + $shippinFees + $taxes ;

                        $order->price = $price;
                        $order->total_price = $total_price;

                        $order->save();
                    }

                    //inserting in order_addresses table

                    foreach($request->address as $type => $address_type) {

                        $request->validate([
                            // 'address.billing.first_name'=>'nullable|exists:clients,id' ,
                        ]);
                        $address['type'] = $type;
                        // return $address;
                        $order->addresses()->create($address_type);
              
    
                    }

                    
                }

                //save changes
                DB::commit();


                $order = order::latest()->first();
                event('order.created',$order);
                return redirect()->route('front.order.payment.create',['order' => $order]);


                
            } catch (Throwable $e) {
                DB::rollback();
                throw $e;
            }
        }


}
