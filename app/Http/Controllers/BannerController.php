<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{

    public function index()
    {
        $banners = Banner::all();
        return view('admin1.banners', compact('banners'));
    }

    public function show()
    {
        return view('admin1.banner-add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'page_name' => 'required|string|max:255',
            'banners' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp',
            'mbanner' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp',
            // 'large_banner' => 'nullable|image|mimes:jpg,jpeg,png,gif',
        ]);

        $banner = new Banner();
        $banner->title = $request->input('title');
        $banner->page_name = $request->input('page_name');

        if ($request->hasFile('image')) {
            $image1 = $request->file('image');
            $imageName1 = time() . '.' . $image1->getClientOriginalExtension();
            if ($image1->storeAs('public/banner-images', $imageName1)) {
                $banner->banners = $imageName1;
            }
        }

        if ($request->hasFile('mimage')) {
            $image = $request->file('mimage');
            $imageName = time() . '-mobile.' . $image->getClientOriginalExtension();
            if ($image->storeAs('public/banner-images', $imageName)) {
                $banner->mbanner = $imageName;
            }
        }

        if ($banner->save()) {
            return redirect('admin/banners')->with('success', 'Banner added successfully!');
        } else {
            return redirect('admin/banners')->with('fail', 'Something went wrong');
        }
    }


    public function edit($id)
    {
        $banner = Banner::find($id);
        return view('admin1.banner-edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     // 'page_name' => 'required|string|max:255',
        //     // 'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp',
        //     // 'mimage' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp',
        // ]);
        $banner = Banner::find($id);
        $banner->title = $request->input('title');
        $banner->page_name = $request->input('page_name');

        if ($request->hasFile('image')) {
            if ($request->oimage) {
                Storage::delete('public/banner-images/' . $request->oimage);
            }
            $image1 = $request->file('image');
            $imageName1 = time() . '.' . $image1->getClientOriginalExtension();
            $image1->storeAs('public/banner-images', $imageName1);
            $banner->banners = $imageName1;
        }

        if ($request->hasFile('mimage')) {
            if ($request->omimage) {
                Storage::delete('public/banner-images/' . $request->omimage);
            }
            $image = $request->file('mimage');
            $imageName = time() . '-mobile.' . $image->getClientOriginalExtension();
            $image->storeAs('public/banner-images', $imageName);
            $banner->mbanner = $imageName;
        }

        if ($banner->save()) {
            return redirect('admin/banners')->with('success', 'Banner updated successfully!');
        } else {
            return redirect('admin/banners')->with('fail', 'Something went wrong');
        }
    }


    public function delete($id)
    {
        $banner = Banner::find($id);

        if (!$banner) {
            return back()->with('fail', 'Banner not found');
        } else {
            if ($banner->banners && Storage::exists('public/banner-images/' . $banner->banners)) {
                if ($banner->mbanner && Storage::exists('public/banner-images/' . $banner->mbanner)) {
                    Storage::delete('public/banner-images/' . $banner->banners);
                    Storage::delete('public/banner-images/' . $banner->mbanner);

                    if ($banner->delete()) {
                        return redirect()->route('banners')->with('success', 'Banner deleted successfully!');
                    } else {
                        return redirect('banners')->with('fail', 'Something went wrong');
                    }
                }
            }
        }
    }
}
