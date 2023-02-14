<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class StoreNotification extends Component
{

    public $notifications ;
    public $unreadCount ;

    public function __construct()
    {
        $store= Auth::guard('store')->user();

        $this->notifications = $store->notifications()->take(10)->get();
        $this->unreadCount = $store->unreadNotifications->count();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.store-notification',['notifications' => $this->notifications ,'unreadCount' => $this->unreadCount]);
    }
}
