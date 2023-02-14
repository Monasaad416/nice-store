<?php

namespace App\Http\Controllers\Dashboard\Admin;
use Exception;
use App\Models\Tag;
use App\Models\Store;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{



    public function index()
    {
        $stores = Store::paginate(10);
        return view('dashboard.admin.pages.stores.index',compact('stores'));
    }

    public function create()
    {
        $categories = Category::all();
        $stores = Store::all();
        return view('dashboard.admin.pages.stores.create',compact('categories','stores'));
    }

    public function store(Request $request)
    {
        try{
            $selectStatus = Store::selectStatus();

            $request->validate([
                'name' => 'required|string|unique:stores,name',
                'email' => 'required|string|email',
                'password' => 'required|string|confirmed|min:8,max:12',
                'phone' => 'required|string',
                'address' => 'required|string',
                'description' => 'required|string',
                'category_id' => 'required|exists:categories,id',
                'image' => 'nullable|image|max:1048567|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000|mimes:jpg,jpeg,png,gfif',
                'cover_image' => 'nullable|image|max:1048567|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000|mimes:jpg,jpeg,png,gfif',
                'status' => 'required|numeric|in:'.implode(',',$selectStatus),
            ]);

            $slug = Str::slug($request->name);
            $request->merge([
                'slug' => $slug,
            ]);

            $path = Storage::putFile("stores",$request->file('image'));
            $store = Store::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'email' => $request->email,
                'password' => $request->password,
                'phone' => $request->phone,
                'address' => $request->address,
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

            $store->tags()->sync($tags_ids);

            return redirect()->route('dashboard.stores.index')->with('success','store Created Successfully.');
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
        $store = Store::findOrFail($id);
        return view('dashboard.admin.pages.stores.edit',compact('store'));
    }

    public function update(Request $request)
    {
         try{
            $selectStatus = store::selectStatus();
            $store = Store::findOrFail($request->id);

            $request->validate([
                'name' =>'nullable|string', [Rule::unique('stores')->ignore($store->id)],
                'description' => 'nullable|string',
                'category_id' => 'nullable|exists:categories,id',
                'store_id' => 'nullable|exists:stores,id',
                'price' => 'nullable|numeric',
                'image' => 'nullable|image|max:1048567|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000|mimes:jpg,jpeg,png,gfif',
                'status' => 'nullable|numeric|in:'.implode(',',$selectStatus),
            ]);



            $slug = $store->slug;

            $path = $store->image;

            if($request->hasFile('image')) {
                if($path) {
                    Storage::delete($path);
                }
                $path = Storage::putFile("stores",$request->file('image'));

                $store->update([
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

                $store->update($request->all());
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

            $store->tags()->sync($tags_ids);

            return redirect()->route('dashboard.stores.index')->with('update','store updated Successfully.');
        }
        catch(Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        try{
           Store::findOrFail($request->id)->delete();
            return redirect()->route('dashboard.stores.index')->with('delete','store has been deleted!');
        }
        catch(Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }
}
