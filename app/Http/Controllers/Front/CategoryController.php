<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function ShowRelatedProducts($category_id)
    {
            $category = Category::findOrFail($category_id);
            return view('front.pages.category.products',compact('category'));
    }
}
