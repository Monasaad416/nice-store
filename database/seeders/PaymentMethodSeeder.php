<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PaymentMethod;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paymentMethods = [
           "PayPal",
            "Visa",
            "Mastercard",
            "Cash",
        ];


        foreach ($paymentMethods as $paymentMethod) {
            PaymentMethod::create(
                [
                    'name' => $paymentMethod,
                ],
            );
        }

    }
}
