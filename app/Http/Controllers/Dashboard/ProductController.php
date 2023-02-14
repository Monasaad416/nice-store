<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use App\Models\Tag;
use App\Models\Store;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('dashboard.pages.products.index',compact('products'));
    }



    public function show($id)
    {
        //
    }

}
