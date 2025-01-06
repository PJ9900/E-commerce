<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

    public function shopCheckout(Request $request)
    {
        if (Auth::check()) {
            if (empty(session('addtocart', []))) {
                return redirect('shop-cart');
            } else {
                $user = User::find(Auth::user()->id);
                $subtotal = $request->input('cart-subtotal');
                $taxes = $request->input('cart-taxes');
                $total = $request->input('cart-total');

                return view('shop-checkout', compact(['subtotal', 'taxes', 'total', 'user']));
            }
        } else {
            return redirect('login')->with('fail', 'Please login to continue!');
        }
    }


    public function checkoutStore(Request $request)
    {

        $request->validate([
            'billing_city' => 'required',
            'billing_state' => 'required',
            'billing_country' => 'required',
            'billing_post_code' => 'required',
        ]);

        if (empty($request->shipping)) {
            return redirect('shop-cart');
        }

        if ($request->shipping == 'shipping_same') {
            $shipping_fname = $request->billing_fname;
            $shipping_lname = $request->billing_lname;
            $shipping_email = $request->billing_email;
            $shipping_phone = $request->billing_phone;
            $shipping_address1 = $request->billing_address1;
            $shipping_state = $request->billing_state;
            $shipping_city = $request->billing_city;
            $shipping_pincode = $request->billing_post_code;
        } else {
            $shipping_fname = $request->shipping_fname;
            $shipping_lname = $request->shipping_lname;
            $shipping_email = $request->shipping_email;
            $shipping_phone = $request->shipping_phone;
            $shipping_address1 = $request->shipping_address1;
            $shipping_state = $request->shipping_state;
            $shipping_city = $request->shipping_city;
            $shipping_pincode = $request->shipping_post_code;
        }

        $productNames = [];
        $sizes = [];
        $colors = [];
        $unitPrices = [];
        $quantities = [];
        $productIds = [];
        $addtocart = session('addtocart', []);
        foreach ($addtocart as $a) {
            $product = Product::find($a['item_id']);
            // Append values to arrays
            $productNames[] = $product->name;
            $sizes[] = $a['size'];
            $colors[] = $a['color'];
            $unitPrices[] = $product->price;
            $quantities[] = $a['qty'];
            $productIds[] = $a['item_id'];
        }

        $order = new Order();
        $order->billing_name = $request->billing_fname . " " . $request->billing_lname;
        $order->billing_email = $request->billing_email;
        $order->billing_company_name = $request->billing_company_name;
        $order->billing_gst = $request->billing_gst;
        $order->billing_state = $request->billing_state;
        $order->billing_pincode = $request->billing_post_code;

        $order->product_name = implode(',', $productNames);
        $order->size = implode(',', $sizes);
        $order->color = implode(',', $colors);
        $order->unit_price = implode(',', $unitPrices);
        $order->quantity = implode(',', $quantities);
        $order->product_id = implode(',', $productIds);

        $order->address = $request->address1;
        $order->user_id = Auth::user()->id;
        $order->delivery_link = 'www.google.com';
        $order->OrderStatus = 'pending';
        $order->rtd = Carbon::now();
        $order->discount = '10';
        $order->aws_no = '23432';
        $order->message = $request->billing_message;
        $order->sku = '39';
        $order->OrderDate = Carbon::now();
        $order->payment_id = rand(1, 200);

        if ($order->save()) {
            $payment = new Payment();
            $payment->user_id = Auth::user()->id;
            $payment->user_name =  $shipping_fname . ' ' . $shipping_lname;
            $payment->user_email  =  $shipping_email;
            $payment->txnid =  rand(1, 2000);
            $payment->paid_amount =  $request->total;
            $payment->card_number =  "1213 3525 5654 7564";
            $payment->card_cvv =  "543";
            $payment->order_id = $order->id;
            $payment->card_month =  "6";
            $payment->card_year =  "27";
            $payment->bank_transaction_info =  "";
            $payment->payment_method =  "";
            $payment->payment_status =  "pending";
            $payment->shipping_status =  "pending";
            $payment->address =  $shipping_address1;
            $payment->state =  $shipping_state;
            $payment->city =  $shipping_city;
            $payment->pincode =  $shipping_pincode;
            $payment->customer_phone =  $shipping_phone;
            $payment->payment_option =  "";
            $payment->add_info =  "";
            $payment->save();
        }

        session()->forget('addtocart');

        return redirect('');
    }
}
