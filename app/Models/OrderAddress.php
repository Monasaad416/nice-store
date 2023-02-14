<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model 
{

    protected $table = 'order_addresses';
    public $timestamps = false;
    protected $fillable = array('order_id', 'type', 'first_name', 'last_name', 'city_id','email', 'phone','street', 'zip_code');

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

}