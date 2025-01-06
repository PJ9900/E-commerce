<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

class WishlistController extends Controller
{

    public function wishlist(Request $request)
    {
        $wishlist = $request->cookie('wishlist');
        $wishlist = $wishlist ? json_decode($wishlist, true) : [];

        if (!empty($wishlist)) {
            $products = Product::whereIn('id', $wishlist)->get();
        } else {
            $products = collect();
        }

        return view('wishlist', compact('products'));
    }

    public function addWishlist(Request $request)
    {

        $itemId = $request->input('item_id');

        $wishlist = $request->cookie('wishlist');

        if ($wishlist) {
            $wishlist = json_decode($wishlist, true);
        } else {
            $wishlist = [];
        }

        if (!in_array($itemId, $wishlist)) {
            $wishlist[] = $itemId;
        }

        // Cookie::queue('wishlist', json_encode($wishlist), 60 * 24 * 30);
        Cookie::queue('wishlist', json_encode($wishlist), 60 * 24 * 30, '/', null, false, true);

        return response()->json([
            'success' => true,
            'totalwishlist' => count($wishlist),
            'message' => 'Item added to wishlist successfully!',
            'wishlist' => $wishlist,
        ]);
    }

    public function removeWishlist(Request $request)
    {

        $itemId = $request->input('item_id');

        $wishlist = $request->cookie('wishlist');

        if ($wishlist) {
            $wishlist = json_decode($wishlist, true);
        } else {
            $wishlist = [];
        }

        // Check if the item exists in the wishlist
        if (($key = array_search($itemId, $wishlist)) !== false) {
            unset($wishlist[$key]);
        }

        // Reindex the array to prevent gaps in the keys
        $wishlist = array_values($wishlist);

        Cookie::queue('wishlist', json_encode($wishlist), 60 * 24 * 30);

        return response()->json([
            'success' => true,
            'message' => 'Item removed from wishlist successfully!',
            'wishlist' => $wishlist,
        ]);
    }

        public function getWishlistCount()
        {
            $wishlist = request()->cookie('wishlist');
            $wishlist = $wishlist ? json_decode($wishlist, true) : [];

            return response()->json([
                'wishlistCount' => count($wishlist),
            ]);
        }

}
