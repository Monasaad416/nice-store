<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function create(Order $order)
    {
        return view('front.pages.payments.create',[
            'order' => $order,
        ]);
    }

    public function createStripePaymentIntentymentIntent(Order $order)
    {
        $stripe = new \Stripe\StripeClient(config('services.stripe.secret_key'));
            $paymentIntent = $stripe->paymentIntents->create([
            'amount' => (float)$order->total_price,
            'currency' => 'usd',
            'automatic_payment_methods' => [
                'enabled' => true,
            ],
        ]);


        return [
            'clientSecret' => $paymentIntent->client_secret,
        ];
    }

    public function confirm(Request $request , Order $order)
    {
        //return dd($request->all());

        $stripe = new \Stripe\StripeClient(config('services.stripe.secret_key'));
        $paymentIntent = $stripe->paymentIntents->retrieve(
        // 'pi_3MYNE7Ew0NAuikPM0LRAJq2m',

        $request->payment_intent,
        []
        );


        if($paymentIntent->status ==  "succeeded") {
          return dd($paymentIntent->id);
            $amount = (float)$paymentIntent->amount;
            $payment = Payment::create([
                'order_id' => $order->id,
                'amount' => $amount,
                'currency_id' => 1,
                'payment_method_id' => 2,
                'status' => 'paid',
                'tranaction_id' => $paymentIntent->id,
                'tranaction_data' => json_encode( $paymentIntent),
            ]);
        }
        return redirect()->route('front.index' ,[
            'status' => 'payment-succeeded',
        ]);
    }
}
