<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use AmrShawky\LaravelCurrency\Facade\Currency;

class CurrencyConverterController extends Controller
{
            public function ConvertCurrency(Request $request){
                $conerted = Currency::rates()
                        ->latest()
                        ->symbols(['USD', 'EUR', 'EGP']) //An array of currency codes to limit output currencies
                        ->base($request->from) //Changing base currency (default: EUR). Enter the three-letter currency code of your preferred base currency.
                        ->amount($request->amount) //Specify the amount to be converted
                        ->round(2) //Round numbers to decimal places
                        ->source('ecb') //Switch data source between forex `default`, bank view or crypto currencies.
                        ->get();

                return response()->json('200', $converted);


    }
}
