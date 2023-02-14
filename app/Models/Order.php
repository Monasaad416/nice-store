<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table = 'orders';
    public $timestamps = true;
    protected $fillable = array('client_id', 'store_id', 'email', 'phone', 'status', 'payment_status', 'payment_method_id');

    public static function booted()
    {
        static::creating(function(Order $order){
            $order->order_number = Order::getNextOrderNumber();
        });
    }

    public static function getNextOrderNumber()
    {
        $year = Carbon::now()->year;
        $currentOrderNumber = Order::whereYear('created_at',$year)->max('order_number');
        if($currentOrderNumber) {
            return $currentOrderNumber + 1;
        }

        return $year . '00001';
    }




    const PENDING= 1;
    const CANCELLED = 2;
    const ACCEPTED = 3;
    const PROCESSING = 4;
    const COMPLETED = 5;
    const DELIVERED = 6;
    const REFUNDED = 7;


    public function label()

    {
        return match($this->status)
        {
            self::PENDING => 'pending',
            self::CANCELLED => 'cancelled',
            self::ACCEPTED => 'accepted',
            self::PROCESSING => 'processing',
            self::COMPLETED => 'completed',
            self::DELIVERED => 'delivered',
            self::REFUNDED => 'refunded',
            default => 'unknown',
        };
    }

    public static function selectOrderStatus()
    {
        return [
            self::PENDING => 'pending',
            self::CANCELLED => 'cancelled',
            self::ACCEPTED => 'accepted',
            self::PROCESSING => 'processing',
            self::COMPLETED => 'completed',
            self::DELIVERED => 'delivered',
            self::REFUNDED => 'refunded',
        ];
    }


    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function store()
    {
        return $this->belongsTo('App\Models\Store');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'order_details')
        ->with('timestamps')
        ->withPivot('product_name','product_price','options','qty');
    }

    public function addresses()
    {
        return $this->hasMany('App\Models\OrderAddress');
    }

    public function billingAddresse()
    {
        return $this->hasOne('App\Models\OrderAddress','order_id','id')
        ->where('type','billing');

        //   return $this->addresses()->where('type','billing');
    }

    public function shippingAddresse()
    {
        return $this->hasOne('App\Models\OrderAddress','order_id','id')
        ->where('type','shipping');
        
        //   return $this->addresses()->where('type','shipping');
    }
    public function payment_method()
    {
        return $this->belongsTo('App\Models\PaymentMethod');
    }

}
