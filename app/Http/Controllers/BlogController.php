<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('admin1.blog', compact('blogs'));
    }

    public function show()
    {
        return view('admin1.blog-add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'short_description' => 'required|string|max:500',
            'description' => 'required|string',
            'status' => 'nullable|in:0,1',
            'slug' => 'required|string|unique:blogs,slug|max:255',
            'image_alt' => 'nullable|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
        ]);

        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->short_description = $request->input('short_description');
        $blog->description = $request->input('description');
        $blog->status = $request->input('status');
        $blog->slug = $request->input('slug');
        $blog->image_alt = $request->input('image_alt');
        $blog->meta_title = $request->input('meta_title');
        $blog->meta_description = $request->input('meta_description');
        $blog->meta_keywords = $request->input('meta_keywords');

        if ($request->hasFile('banner')) {
            $image = $request->file('banner');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/blog-images', $imageName);
            $blog->banner = $imageName;
        }

        if ($blog->save()) {
            return redirect()->route('blogs')->with('success', 'Blog added successfully!');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }


    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('admin1.blog-edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'short_description' => 'required|string|max:500',
            'description' => 'required|string',
            'status' => 'nullable|in:0,1',
            'image_alt' => 'nullable|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
        ]);

        $blog = Blog::find($id);
        $blog->title = $request->input('title');
        $blog->short_description = $request->input('short_description');
        $blog->description = $request->input('description');
        $blog->status = $request->input('status');
        $blog->slug = $request->input('slug');
        $blog->image_alt = $request->input('image_alt');
        $blog->meta_title = $request->input('meta_title');
        $blog->meta_description = $request->input('meta_description');
        $blog->meta_keywords = $request->input('meta_keywords');

        if ($request->hasFile('banner')) {
            if ($request->obanner) {
                Storage::delete('public/blog-images/' . $request->obanner);
            }
            $image = $request->file('banner');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/blog-images', $imageName);
            $blog->banner = $imageName;
        }

        if ($blog->save()) {
            return redirect()->route('blogs')->with('success', 'Blog updated successfully!');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }


    public function delete($id)
    {
        $blog = Blog::find($id);

        if (!$blog) {
            return back()->with('fail', 'Banner not found');
        } else {
            if ($blog->banner && Storage::exists('public/blog-images/' . $blog->banner)) {
                Storage::delete('public/blog-images/' . $blog->banner);

                if ($blog->delete()) {
                    return redirect()->route('blogs')->with('success', 'Blog deleted successfully!');
                } else {
                    return back()->with('fail', 'Something went wrong');
                }
            }
        }
    }

    public function showBlogs()
    {
        $blogs = Blog::all();
        return view('blog', compact('blogs'));
    }

    public function blogShop($slug)
    {
        $blog = DB::table('blogs')->where('slug', $slug)->first();
        $blogs = Blog::orderBy('created_at', 'desc')->limit(3)->get();
        return view('blog-details', compact(['blog', 'blogs']));
    }
}