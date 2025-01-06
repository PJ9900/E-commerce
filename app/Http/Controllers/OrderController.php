<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::all();
        // $results = DB::table('users')
        //     ->join('orders', 'users.id', '=', 'orders.user_id')
        //     ->join('payments', 'orders.id', '=', 'payments.order_id')
        //     ->select('orders.*', 'payments.*', 'users.*')  // Select fields from both tables
        //     ->get();
        // dd($results);
        return view('admin1.order', compact('order'));
    }
}
