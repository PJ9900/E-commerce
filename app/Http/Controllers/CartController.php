<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $itemId = $request->input('item_id');
        $size = $request->input('size');
        $color = $request->input('color');
        $qty = $request->input('qty');
        $exist = false;

        // Retrieve the 'addtocart' session data, if it exists. Default it to an empty array if not set.
        $addtocart = session('addtocart', []);

        // Ensure $addtocart is an array
        if (!is_array($addtocart)) {
            $addtocart = [];
        }

        // Check if the item is already in the cart
        foreach ($addtocart as $key => $item) {
            // Check if the itemId, size, and color already exist in the cart
            // if ($item['item_id'] == $itemId && $item['size'] == $size && $item['color'] == $color) {
            if ($item['item_id'] == $itemId) {
                $exist = true;
                break;
            }
        }

        // If the item doesn't exist in the cart, add it
        if (!$exist) {
            $addtocart[] = [
                'item_id' => $itemId,
                'size' => $size,
                'color' => $color,
                'qty' => $qty
            ];
        }

        // Store the updated cart data in the session
        session(['addtocart' => $addtocart]);

        // Return a JSON response
        return response()->json([
            'success' => true,
            'message' => 'Item added to cart successfully!',
            'exist' => $exist,
            'addtocart' => $addtocart, // Return the updated cart data
        ]);
    }

    public function shopCart(Request $request)
    {
        // Retrieve cart items from the session
        $addtocart = session('addtocart', []);

        if (!empty($addtocart)) {
            // Extract product IDs from the cart items
            $productIds = array_column($addtocart, 'item_id');
            // Fetch the products corresponding to those IDs
            $products = Product::whereIn('id', $productIds)->get();

            // Map over the cart items and attach relevant product details
            foreach ($addtocart as $key => $item) {
                // Find the product in the $products collection
                $product = $products->firstWhere('id', $item['item_id']);
                if ($product) {
                    // Attach only necessary attributes to the cart item
                    $addtocart[$key]['product_name'] = $product->name;
                    $addtocart[$key]['sub_total'] = $product->price * $addtocart[$key]['qty'];
                    $addtocart[$key]['product_price'] = $product->price;
                    $addtocart[$key]['product_image'] = $product->p_featured_photo; // Example attribute
                }
            }
        } else {
            $addtocart = [];
        }
        // Return the cart view with the cart items
        return view('shop-cart', compact('addtocart'));
    }

    public function removeAddToCart(Request $request)
    {
        $itemId = $request->input('item_id');
        $addtocart = session('addtocart', []);  // Get the cart from session

        // Check if the item exists in the cart
        $addtocart = array_filter($addtocart, function ($item) use ($itemId) {
            // Remove all items with the given item_id
            return $item['item_id'] !== $itemId;
        });

        // Reindex the array after removing the item
        $addtocart = array_values($addtocart);

        // Update the session with the modified cart
        session(['addtocart' => $addtocart]);

        // Return a JSON response with success and updated cart
        return response()->json([
            'success' => true,
            'message' => 'Item removed from cart successfully!',
            'addtocart' => $addtocart, // Return the updated cart data
        ]);
    }

    public function updateQuantity(Request $request)
    {
        $itemId = $request->input('item_id');
        $size = $request->input('size');
        $color = $request->input('color');
        $qty = $request->input('qty');
        $exist = false;

        // Retrieve the 'addtocart' session data, if it exists. Default it to an empty array if not set.
        $addtocart = session('addtocart', []);

        // Ensure $addtocart is an array
        if (!is_array($addtocart)) {
            $addtocart = [];
        }

        // Check if the item already exists in the cart
        foreach ($addtocart as $key => &$item) { // Use reference to modify the item directly
            // Check if the itemId, size, and color already exist in the cart
            if ($item['item_id'] == $itemId && $item['size'] == $size && $item['color'] == $color) {
                // If the item exists, update the quantity
                $item['qty'] = $qty;  // Increase the quantity by the new qty
                $exist = true;
                break;
            }
        }

        // If the item doesn't exist in the cart, add it
        if (!$exist) {
            $addtocart[] = [
                'item_id' => $itemId,
                'size' => $size,
                'color' => $color,
                'qty' => $qty
            ];
        }

        // Store the updated cart data in the session
        session(['addtocart' => $addtocart]);
        // Return a JSON response
        return response()->json([
            'success' => true,
            'message' => $exist ? 'Item quantity updated successfully!' : 'Item added to cart successfully!',
            'exist' => $exist,
            'addtocart' => $addtocart, // Return the updated cart data
        ]);
    }


    public function getCartCount()
    {
        // Retrieve cart items from the session
        $addtocart = session('addtocart', []);

        // Count the total items in the cart
        $cartCount = 0;
        foreach ($addtocart as $item) {
            $cartCount += $item['qty']; // Add the quantity of each item
        }

        return response()->json([
            'cartCount' => $cartCount,
        ]);
    }

}
