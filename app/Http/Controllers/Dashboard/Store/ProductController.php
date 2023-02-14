<?php

namespace App\Http\Controllers\Dashboard\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return dd($products);
        return view('dashboard.pages.products.index',compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $stores = Store::all();
        return view('dashboard.pages.products.create',compact('categories','stores'));
    }

    public function store(Request $request)
    {
        try{
            $selectStatus = Product::selectStatus();

            $request->validate([
                'name' => 'required|string|unique:products,name',
                'description' => 'required|string',
                'category_id' => 'required|exists:categories,id',
                'store_id' => 'required|exists:stores,id',
                'price' => 'required|numeric',
                'image' => 'required|image|max:1048567|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000|mimes:jpg,jpeg,png,gfif',
                'status' => 'required|numeric|in:'.implode(',',$selectStatus),
            ]);

            $slug = Str::slug($request->name);
            $request->merge([
                'slug' => $slug,
            ]);

            $path = Storage::putFile("products",$request->file('image'));
            $product = Product::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'description' => $request->description,
                'category_id' => $request->category_id,
                'store_id' => $request->store_id,
                'price' => $request->price,
                'image' => $path,
                'status' => $request->status,
            ]);

            $tags = explode(',', $request->tags);
            $tags_ids = [];

            foreach ($tags as $key => $tag_name) {
                $tag = Tag::where('name' , $tag_name)->first();
                if(!$tag){
                    $slug = Str::slug($tag_name);
                    $newTag = Tag::create([
                        'name' => $tag_name,
                        'slug' => $slug,
                    ]);
                }

                $tags_ids[] = $newTag->id;
            }

            $product->tags()->sync($tags_ids);

            return redirect()->route('dashboard.products.index')->with('success','Product Created Successfully.');
        }
        catch(Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('dashboard.pages.products.edit',compact('product'));
    }

    public function update(Request $request)
    {
         try{
            $selectStatus = Product::selectStatus();
            $product = Product::findOrFail($request->id);

            $request->validate([
                'name' =>'nullable|string', [Rule::unique('products')->ignore($product->id)],
                'description' => 'nullable|string',
                'category_id' => 'nullable|exists:categories,id',
                'store_id' => 'nullable|exists:stores,id',
                'price' => 'nullable|numeric',
                'image' => 'nullable|image|max:1048567|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000|mimes:jpg,jpeg,png,gfif',
                'status' => 'nullable|numeric|in:'.implode(',',$selectStatus),
            ]);



            $slug = $product->slug;

            $path = $product->image;

            if($request->hasFile('image')) {
                if($path) {
                    Storage::delete($path);
                }
                $path = Storage::putFile("products",$request->file('image'));

                $product->update([
                    'name' => $request->name,
                    'slug' => Str::slug($request->name),
                    'description' => $request->description,
                    'category_id' => $request->category_id,
                    'store_id' => $request->store_id,
                    'price' => $request->price,
                    'image' => $path,
                    'status' => $request->status,
                ]);
            } else {

                $product->update($request->all());
            }


            if($request->has('tags')) {
                $tags = explode(',', $request->tags);
                $tags_ids = [];

                foreach ($tags as $key => $tag_name) {
                    $tag = Tag::where('name' , $tag_name)->first();
                    if(!$tag){
                        $slug = Str::slug($tag_name);
                        $newTag = Tag::create([
                            'name' => $tag_name,
                            'slug' => $slug,
                        ]);
                    }

                    $tags_ids[] = $newTag->id;
                }
            }

            $product->tags()->sync($tags_ids);

            return redirect()->route('dashboard.products.index')->with('update','Product updated Successfully.');
        }
        catch(Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        try{
           Product::findOrFail($request->id)->delete();
            return redirect()->route('dashboard.products.index')->with('delete','Product has been deleted!');
        }
        catch(Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }
}
