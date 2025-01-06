<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();
        $category = Category::all();
        $banner = Banner::where('page_name', 'Home')->select('banners', 'mbanner')->get();
        $productsOnSale = Product::limit(3)->get();
        return view('welcome', compact(['products', 'productsOnSale', 'category', 'banner']));
    }


    public function shop()
    {
        $products = Product::all();
        return view('shop', compact('products'));
    }

    public function profileHandle(Request $request, $id)
    {
        $user = User::find($id);
        return view('user-profile', compact('user'));
    }

    public function Address()
    {
        $address = User::find(Auth::user()->id);
        return view('add-address', compact('address'));
    }

    public function orderList()
    {
        // $orders = Order::where('user_id', Auth::user()->id)->get();
        $results = DB::table('orders')
            ->join('payments', 'orders.id', '=', 'payments.order_id')  // Join orders and payments on order_id
            ->join('users', 'orders.user_id', '=', 'users.id')  // Join orders and users on user_id
            ->where('users.id', '=', Auth::user()->id)  // Filter by the currently authenticated user's ID
            ->select('orders.*', 'payments.paid_amount')  // Select the relevant columns from all three tables
            ->get();
        return view('order-list', compact('results'));
    }

    public function orderDetail($id)
    {
        $order = Order::find($id)->get();
        dd($order);
    }

    public function storeAddress(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->billing_local_area = $request->local_area;
        $user->billing_city = $request->city;
        $user->billing_state = $request->state;
        $user->billing_zip = $request->zipcode;
        if ($user->save()) {
            return redirect('/address');
        } else {
            return "Something went Wrong";
        }
    }
}
