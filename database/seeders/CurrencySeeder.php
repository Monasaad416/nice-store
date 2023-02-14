<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = ['EGP','SAR','USD','AED'];
        foreach ($currencies as $currency) {
            $name = $currency;
            Currency::create(
                [
                    'name' => $currency,
                ],
            );
        }
    }
}
