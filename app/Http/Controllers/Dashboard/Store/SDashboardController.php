<?php

namespace App\Http\Controllers\Dashboard\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SDashboardController extends Controller
{
    public function index () {
        return view('dashboard.pages.Store.index');
    }
}
