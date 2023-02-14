<?php

namespace App\View\Components;

use App\Facades\CartFacade;
use Illuminate\View\Component;

class CartComponent extends Component
{
    public $facadeItems;
    public $facadeTotal;

    public function __construct()
    {
        $this->facadeItems = CartFacade::get();
        $this->facadeTotal = CartFacade::total();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cart-component');
    }
}
