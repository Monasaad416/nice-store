<?php

namespace App\Http\Controllers\Front;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
   public function index(Order $order)
   {
    return dd('order details');
   }
}
