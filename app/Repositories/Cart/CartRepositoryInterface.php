<?php

namespace App\Repositories\Cart;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

interface CartRepositoryInterface
{
    public function get() : Collection ;
    public function add(Product $product, $qty = 1);
    public function update($id , $qty);
    public function delete($id);
    public function empty();
    public function total() : float;
}
