<?php

namespace App\Models;

use App\Observers\CartObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder; 
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;

class Cart extends Model
{

    protected $table = 'carts';
    public $timestamps = true;
    public $incrementing = false;

    protected $fillable = array('cookie_id', 'client_id', 'product_id', 'qty', 'options');


    public static function getCookieId()
    {
        $cookie_id = Cookie::get('cart_id');
        if(!$cookie_id)
        {
            $cookie_id = Str::uuid();
            $expiryTime = 30*24*60;//time of cookies by minutes
            Cookie::queue('cart_id',$cookie_id, $expiryTime);
        }

        return $cookie_id;
    }
    public static function booted() {
        static::observe(CartObserver::class);

        static::addGlobalScope('cookie_id', function(Builder $builder) {
            $builder->where('cookie_id', Cart::getCookieId());
        });
    }

    public function client() {
        return $this->belongsTo(Client::class)->withDefault([
            'name' => 'Anonymous Client',
        ]);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }


}
