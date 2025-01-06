<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin1.top-category', compact('categories'));
    }

    public function show()
    {
        return view('admin1.top-category-add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tcat_name' => 'required|string|max:255',
            'banner' => 'nullable|image|mimes:jpeg,png,webp,jpg,gif,svg|max:2048',
            'content' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_keyword' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'show_on_menu' => 'required|boolean',
            'slug' => 'required|string|unique:categories,slug|max:255',
        ]);

        $category = new Category();
        $category->tcat_name = $request->input('tcat_name');
        $category->content = $request->input('content');
        $category->meta_title = $request->input('meta_title');
        $category->meta_keyword = $request->input('meta_keyword');
        $category->meta_description = $request->input('meta_description');
        $category->show_on_menu = $request->input('show_on_menu');
        $category->slug = $request->input('slug');

        if ($request->hasFile('banner')) {
            $image = $request->file('banner');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/category-images', $imageName);
            $category->banner = $imageName;
        }

        if ($category->save()) {
            return redirect()->route('categories')->with('success', 'Category added successfully!');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }


    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin1.top-category-edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tcat_name' => 'required|string|max:255',
            'banner' => 'nullable|image|mimes:jpeg,png,webp,jpg,gif,svg|max:2048',
            'content' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_keyword' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'show_on_menu' => 'required|boolean'
        ]);

        $category = Category::find($id);
        $category->tcat_name = $request->input('tcat_name');
        $category->content = $request->input('content');
        $category->meta_title = $request->input('meta_title');
        $category->meta_keyword = $request->input('meta_keyword');
        $category->meta_description = $request->input('meta_description');
        $category->show_on_menu = $request->input('show_on_menu');
        $category->slug = $request->input('slug');

        if ($request->hasFile('banner')) {
            if ($request->existing_banner) {
                Storage::delete('public/category-images/' . $request->existing_banner);
            }
            $image = $request->file('banner');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/category-images', $imageName);
            $category->banner = $imageName;
        }

        if ($category->save()) {
            return redirect('categories')->with('success', 'Category updated successfully!');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }


    public function delete($id)
    {
        $category = Category::find($id);
        Storage::delete('public/category-images/' . $category->banner);

        if ($category->delete()) {
            return redirect()->route('categories')->with('success', 'Category deleted successfully!');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function categoryShop($slug)
    {
        // Fetch the category based on tcat_id
        $category = DB::table('categories')->where('slug', $slug)->first();

        if (!$category) {
            return redirect()->back()->with('error', 'Category not found.');
        }
        $cat_name = $category->tcat_name;

        $products = DB::table('products')
            ->where('category_id', $category->tcat_id)
            ->get();

        return view('category-shop', compact(['products', 'cat_name']));
    }
}
