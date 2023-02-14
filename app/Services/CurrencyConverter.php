<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CurrencyConverter
{
        private $apiKey ;
        //9bZcax96PKOQPxT5brG6jp7qtnqReSXqzM1n8nP7
        private $baseUrl = 'https://free.currconv.com/api/v7';

        //api/v7/convert?q=USD_PHP,PHP_USD&compact=ultra&apiKey=[YOUR_API_KEY]

        //convert?q=USD_PHP,PHP_USD&compact=ultra&apiKey=[YOUR_API_KEY]
        public function __construct($apiKey)
        {
            $this->apiKey = $apiKey;
        }

        public function convert( string $from , string $to , float $amount =1) :float
        {
                $q = "{$from}_{$to}";

                $response = Http::baseUrl($this->baseUrl)
                // ->withHeader([
                //         'content_type' =>'application/json',
                //         // 'authorization' => "Bearer $this->apiKey"
                // ])
                ->get('/convert',[
                    'q'=> $q ,
                    'compact'=>'ultra',
                    'apiKey'=> $this->apiKey
                ]);

                $result = $response->json();
      

                return $result[$q] * $amount;

        }



}
