<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\CategoryController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\controllers\Front\CurrencyConverterController;
use App\Http\Controllers\Front\PaymentController;
use App\Http\Controllers\Front\OrderController;
use App\Http\Controllers\Front\ClientDashboaedController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::prefix('/front')->name('front.')->group(function () {

    Route::get('/',[HomeController::class,'index'])->name('index');
    Route::get('/category/{category_id}/products',[CategoryController::class,'ShowRelatedProducts'])->name('category.products');
    Route::post('/product/add-to-cart',[CartController::class,'store'])->name('carts.store');
    Route::post('/cart/increase/{item_id}',[CartController::class,'increase'])->name('cart.increase');
    Route::post('/cart/decrease/{item_id}',[CartController::class,'decrease'])->name('cart.decrease');
    // Route::post('modify-quantity',[CartController::class,'modifyQuantity'])->name('cart.modify');
    Route::get('/cart',[CartController::class,'index'])->name('cart');
    Route::get('/checkout/create',[CheckoutController::class,'create'])->name('checkout.create');
    Route::post('/checkout/store',[CheckoutController::class,'store'])->name('checkout.store');
    Route::get('/cities/{governorate_id}',[CheckoutController::class,'getCities']);
    Route::get('/order/{$order}/details',[OrderController::class,'index']);

    //google othentication
    Route::get('/auth/{provider}/redirect',[SocialLoginController::class,'redirect'])->name('auth.socialite.redirect');
    Route::get('/auth/{provider}/callBack',[SocialLoginController::class,'callback'])->name('auth.socialite.callback');
    //payment
    Route::get('/order/{order}/create-payment',[PaymentController::class,'create'])->name('order.payment.create');
    Route::post('/order/{order}/stripe/payment-intent',[PaymentController::class,'createStripePaymentIntentymentIntent'])->name('order.stripe.paymentIntent');
    Route::get('/order/{order}/stripe/payment-confirmation',[PaymentController::class,'confirm'])->name('stripe.return');
    //conver currency
    Route::post('/convert/currency',[CurrencyConverterController::class,'storeCurrencyRate'])->name('convert.currency');
});


Route::middleware(['auth:client','isClient'])->prefix('/front')->name('front.')->group(function () {
    Route::get('/client/dashboard',[ClientDashboaedController::class,'index'])->name('client.dashboard');
});



require __DIR__.'/client-auth.php';






