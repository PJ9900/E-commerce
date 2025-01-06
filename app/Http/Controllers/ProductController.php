<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('admin1.product', compact('products'));
    }

    public function show()
    {
        $category = Category::all();
        return view('admin1.product-add', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'p_name' => 'required|string|max:255',
            'p_sku' => 'nullable|string|max:255',
            'category_id' => 'required|integer|max:150',
            'p_featured_photo' => 'nullable|image|mimes:webp,jpg,jpeg,png,gif|max:1024',
            'p_description' => 'nullable|string|max:1000',
            'p_short_description' => 'nullable|string|max:500',
            'p_long_description' => 'required|string',
            'additional_info' => 'nullable|string|max:1000',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer',
            'variant' => 'integer|numeric',
            'slug' => 'nullable|string|max:255',
        ]);


        $p_featured = $request->input('p_is_featured') == 'on' ? 1 : 0;
        $p_active = $request->input('p_is_active') == 'on' ? 1 : 0;

        $product = new Product();
        $product->name = $request->input('p_name');
        $product->p_sku = $request->input('p_sku');
        $product->size = $request->input('p_size');
        $product->color = $request->input('p_color');
        $product->variant = $request->input('variant');
        $product->description = $request->input('p_description');
        $product->p_short_description = $request->input('p_short_description');
        $product->p_long_description = $request->input('p_long_description');
        $product->additional_info = $request->input('additional_info');
        $product->p_is_featured = $p_featured;
        $product->p_is_active = $p_active;
        $product->slug = $request->input('slug');
        $product->price = $request->input('price');
        $product->stock_quantity = $request->input('stock_quantity');
        $product->variant = $request->input('variant');
        $product->category_id = $request->input('category_id');

        if ($request->hasFile('p_featured_photo')) {
            $image = $request->file('p_featured_photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            if ($image->storeAs('public/product-images', $imageName)) {
                $product->p_featured_photo = $imageName;

                if ($product->save()) {
                    return redirect()->route('products')->with('success', 'Product added successfully!');
                } else {
                    return back()->with('fail', 'Something went wrong');
                }
            }
        }
    }


    public function edit($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        return view('admin1.product-edit', compact(['product', 'category']));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'p_name' => 'required|string|max:255',
            'p_sku' => 'nullable|string|max:255',
            'category_id' => 'required|integer|max:150',
            'p_featured_photo' => 'nullable|image|mimes:webp,jpg,jpeg,png,gif|max:1024',
            'p_description' => 'nullable|string|max:1000',
            'p_short_description' => 'nullable|string|max:500',
            'p_long_description' => 'required|string',
            'additional_info' => 'nullable|string|max:1000',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|numeric',
            'variant' => 'nullable|numeric',
            'slug' => 'nullable|string|max:255',
        ]);

        $p_featured = $request->input('p_is_featured') == 'on' ? 1 : 0;
        $p_active = $request->input('p_is_active') == 'on' ? 1 : 0;

        $product = Product::find($id);
        $product->name = $request->input('p_name');
        $product->p_sku = $request->input('p_sku');
        $product->variant = $request->input('variant');
        $product->size = $request->input('p_size');
        $product->color = $request->input('p_color');
        $product->description = $request->input('p_description');
        $product->p_short_description = $request->input('p_short_description');
        $product->p_long_description = $request->input('p_long_description');
        $product->additional_info = $request->input('additional_info');
        $product->p_is_featured = $p_featured;
        $product->p_is_active = $p_active;
        $product->slug = $request->input('slug');
        $product->price = $request->input('price');
        $product->stock_quantity = $request->input('stock_quantity');
        $product->category_id = $request->input('category_id');

        if ($request->hasFile('p_featured_photo')) {
            if ($request->existing_photo) {
                Storage::delete('public/product-images/' . $request->existing_photo);
            }
            $image = $request->file('p_featured_photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/product-images', $imageName);
            $product->p_featured_photo = $imageName;
        }

        if ($product->save()) {
            return redirect()->route('products')->with('success', 'Product updated successfully!');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }


    public function delete($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return back()->with('fail', 'Product not found');
        } else {
            if ($product->p_featured_photo && Storage::exists('public/product-images/' . $product->p_featured_photo)) {
                Storage::delete('public/product-images/' . $product->p_featured_photo);

                if ($product->delete()) {

                    return back()->with('success', 'Product deleted successfully!');
                } else {
                    return back()->with('fail', 'Something went wrong');
                }
            }
        }
    }

    public function productDetail(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->first();

        // Get all products with the same category_id
        $products_in_category = Product::where('category_id', $product->category_id)->get();


        return view('shop-details', compact(['product', 'products_in_category']));
    }
}
