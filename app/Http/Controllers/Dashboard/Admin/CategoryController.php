<?php

namespace App\Http\Controllers\Dashboard\Admin;

use Exception;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::search($request->query())->paginate(15);
        return view('dashboard.admin.pages.categories.index',compact('categories'));
    }

    public function create()
    {
        $categories = Category::paginate(15);
        //$categories = Category::status('active')->paginate(15); // scopeStatus from model
        return view('dashboard.admin.pages.categories.create',compact('categories'));
    }

    public function store(Request $request)
    {
        try{
            $selectStatus = Category::selectStatus();

            $request->validate([
                'name' => 'required|string|unique:categories,name',
                'description' => 'required|string',
                'parent_id' => 'nullable|exists:categories,id',
                'status' => 'required|numeric|in:'.implode(',',$selectStatus),
                'image' =>'nullable|image|max:1048567|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000|mimes:jpg,jpeg,png,gfif',
            ]);


            if($request->hasFile('image')) {
                $path = Storage::putFile("categories",$request->file('image'));
                Category::create([
                    'name' => $request->name,
                    'description' => $request->description,
                    'parent_id'=> $request->parent_id,
                    'status' => $request->status,
                    'image' => $path,
                ]);
            } else {
                Category::create([
                    'name' => $request->name,
                    'description' => $request->description,
                    'parent_id'=> $request->parent_id,
                    'status' => $request->status,
                ]);
            }
            return redirect()->route('dashboard.categories.index')->with('success','Category Created Successfully.');
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
        $category = Category::findOrFail($id);
        return view('dashboard.admin.pages.categories.edit',compact('category'));
    }

    public function update(Request $request)
    {
        try{

            $selectStatus = Category::selectStatus();
            $category = Category::findOrFail($request->id);

            $request->validate([
                'name' =>'nullable|string',[Rule::unique('categories')->ignore($category->id)],
                'description' => 'nullable|string',
                'parent_id' => 'nullable|exists:categories,id',
                'status' => 'nullable|numeric|in:'.implode(',',$selectStatus),
                'image' => 'nullable|image|max:1048567|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000|mimes:jpg,jpeg,png,gfif',
            ]);


            $path = $category->image;

            if($request->hasFile('image')){
                if($path) {
                    Storage::delete($path);
                }
                $path = Storage::putFile("categories",$request->file('image'));

                $category->update([
                    'name' => $request->name,
                    'description' => $request->description,
                    'parent_id'=> $request->parent_id,
                    'status' => $request->status,
                    'image' => $path,
                ]);
            } else {

            $category->update([
                'name' => $request->name,
                'description' => $request->description,
                'parent_id'=> $request->parent_id,
                'status' => $request->status,
            ]);
            }

            return redirect()->route('dashboard.categories.index')->with('update','Category Updated Successfully.');
        }
        catch(Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        try{
           Category::findOrFail($request->id)->delete();
            return redirect()->route('dashboard.categories.index')->with('delete','Category has been deleted!');
        }
        catch(Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

}

