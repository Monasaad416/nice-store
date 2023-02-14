<?php

namespace App\Http\Controllers\Front;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Services\CurrencyConverter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class CurrencyConverterController extends Controller
{
    public function storeCurrencyRate(Request $request)
    {
        // $request->validate([
        //     'currency_code' => 'required|string|size:3'
        // ]);
        //return dd($request->all());

    $baseCurrencyCode = config('app.currency');

    $currencyCode = $request->input('currency_code');
    $currenyKey = 'currency_rate'. $currencyCode; // make cache for each currency cache name=string.var to make different key for each cyrrency
    $rate = Cache::get($currenyKey); // if currency rates not found empty zero will be returned
        
    if(!isset($rate)) {

        $converter = new CurrencyConverter(config('services.currency_converter.api_key'));
        $rate = $converter->convert($baseCurrencyCode , $currencyCode);

        Cache::put($currenyKey, $rate , Carbon::now()->addMinutes(60));

    }

    Session::put('currency_code' , $currencyCode);
    return redirect()->back()->with('covert' , "Currency Converted to . $currencyCode ");
    }
}
