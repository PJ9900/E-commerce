@extends('layout')

@section('content')

  <!-- popup search -->
  {{-- <div class="search-popup">
    <button class="close-search"><span class="far fa-times"></span></button>
    <form action="#">
        <div class="form-group">
            <input type="search" name="search-field" class="form-control" placeholder="Search Here..." required>
            <button type="submit"><i class="far fa-search"></i></button>
        </div>
    </form>
</div> --}}
<!-- popup search end -->


<main class="main">

    <!-- breadcrumb -->
    <div class="site-breadcrumb">
        <div class="site-breadcrumb-bg" style="background: url({{asset('assets/img/breadcrumb/01.jpg')}})"></div>
        <div class="container">
            <div class="site-breadcrumb-wrap">
                <h4 class="breadcrumb-title">Shop Checkout</h4>
                <ul class="breadcrumb-menu">
                    <li><a href="index.php"><i class="far fa-home"></i> Home</a></li>
                    <li class="active">Shop Checkout</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->


    <!-- shop checkout -->
    <div class="shop-checkout py-90">
        @if ($errors->any())
         <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif
        <div class="container">
            <div class="shop-checkout-wrap">
                <form action="{{route('checkout.store')}}" method="POST" class="col-12">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="shop-checkout-step">
                                <div class="accordion" id="shopCheckout">
                                    <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#checkoutStep1" aria-expanded="true" aria-controls="checkoutStep1">
                                            Your Billing Address
                                        </button>
                                    </h2>
                                    <div id="checkoutStep1" class="accordion-collapse collapse show" data-bs-parent="#shopCheckout">
                                        <div class="accordion-body">
                                            <div class="shop-checkout-form row">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>First Name</label>
                                                                <input type="text" value="{{$user->first_name}}" name="billing_fname" class="form-control" placeholder="First Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>Last Name</label>
                                                                <input type="text" value="{{$user->last_name}}" class="form-control" name="billing_lname" placeholder="Last Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input type="email" value="{{$user->email}}" name="billing_email" class="form-control" placeholder="Email Address">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>Phone</label>
                                                                <input type="text" value="{{$user->phone}}" name="billing_phone" class="form-control" placeholder="Phone Number">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label>Address Line 1</label>
                                                                <input type="text" value="{{$user->billing_local_area}} {{$user->billing_city}} {{$user->state}} {{$user->billing_zicode}}" name="billing_address1" class="form-control" placeholder="Address Line 1">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>Country</label>
                                                                <input type="text" value="{{$user->billing_country}}" name="billing_country" class="form-control" placeholder="country">
                                                                @error('billing_country')
                                                                 <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>City</label>
                                                                <input type="text" value="{{$user->billing_city}}" name="billing_city" class="form-control" placeholder="City">
                                                            </div>
                                                            @error('billing_city')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                           @enderror
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>Post Code</label>
                                                                <input type="text" value="{{$user->billing_zip}}" name="billing_post_code" class="form-control" placeholder="Post Code">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>State</label>
                                                                <input type="text" value="{{$user->billing_state}}" name="billing_state" class="form-control" placeholder="State">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label>Your Message For Order</label>
                                                                <textarea cols="30" name="billing_message" rows="4" class="form-control" placeholder="Your Message"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div> 
                                        </div>
                                    </div>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="shipping" id="flexRadioDefault1" value="shipping_same" >
                                        <label class="form-check-label" for="flexRadioDefault1">
                                          Shippping address is same
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="shipping" id="flexRadioDefault2" value="shipping_different" >
                                        <label class="form-check-label" for="flexRadioDefault2">
                                          Shippping address is different
                                        </label>
                                      </div>
                                    <div class="accordion-item" id="Accordion_shipping">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#checkoutStep2" aria-expanded="false" aria-controls="checkoutStep2">
                                            Your Shipping Address
                                        </button>
                                    </h2>
                                    <div id="checkoutStep2" class="accordion-collapse collapse" data-bs-parent="#shopCheckout">
                                        <div class="accordion-body">
                                            <div class="shop-checkout-form">
                                                {{-- <form action="#"> --}}
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>First Name</label>
                                                                <input type="text" name="shipping_fname" class="form-control" placeholder="First Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>Last Name</label>
                                                                <input type="text" name="shipping_lname" class="form-control" placeholder="Last Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input type="email" name="shipping_email" class="form-control" placeholder="Email Address">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>Phone</label>
                                                                <input type="text" name="shipping_phone" class="form-control" placeholder="Phone Number">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label>Address Line 1</label>
                                                                <input type="text" name="shipping_address1" class="form-control" placeholder="Address Line 1">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>Country</label>
                                                                <select class="select" name="shipping_country" >
                                                                    <option value="india" selected>India</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>City</label>
                                                                <input type="text" name="shipping_city" class="form-control" placeholder="City">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>Post Code</label>
                                                                <input type="text" name="shipping_post_code" class="form-control" placeholder="Post Code">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>State</label>
                                                                <input type="text" name="shipping_state" class="form-control" placeholder="State">
                                                            </div>
                                                        </div>
                                                        {{-- <div class="col-lg-12">
                                                            <div class="shop-shipping-method">
                                                                <h6>Choose Shipping Method</h6>
                                                                <div class="row">
                                                                    <div class="col-md-6 col-lg-4 col-xxl-3">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" checked name="method" id="ssm-1">
                                                                            <label class="form-check-label" for="ssm-1">
                                                                                Standard
                                                                                <span>Shipping Cost - Free</span>
                                                                                <span>6-7 Days</span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-lg-4 col-xxl-3">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="method" id="ssm-2">
                                                                            <label class="form-check-label" for="ssm-2">
                                                                                Express
                                                                                <span>Shipping Cost - $20</span>
                                                                                <span>1-2 Days</span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-lg-4 col-xxl-3">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="method" id="ssm-3">
                                                                            <label class="form-check-label" for="ssm-3">
                                                                                Courier
                                                                                <span>Shipping Cost - $30</span>
                                                                                <span>2-3 Days</span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-lg-4 col-xxl-3">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="method" id="ssm-4">
                                                                            <label class="form-check-label" for="ssm-4">
                                                                                Fastgo
                                                                                <span>Shipping Cost - $15</span>
                                                                                <span>1-3 Days</span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                             <button type="button" class="theme-btn theme-btn2"><span class="fas fa-arrow-left"></span>Previous</button>
                                                            <button type="submit" class="theme-btn">Check Out<i class="fas fa-arrow-right"></i></button>
                                                        </div> --}}
                                                    </div>
                                                {{-- </form> --}}
                                            </div> 
                                        </div>
                                    </div>
                                    </div>
                                    {{-- <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#checkoutStep3" aria-expanded="false" aria-controls="checkoutStep3">
                                        Your Payment Info
                                        </button>
                                    </h2>
                                    <div id="checkoutStep3" class="accordion-collapse collapse" data-bs-parent="#shopCheckout">
                                        <div class="accordion-body">
                                            <div class="shop-checkout-payment">
                                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link active" id="pills-tab-1" data-bs-toggle="pill"
                                                            data-bs-target="#pills-1" type="button" role="tab" aria-controls="pills-1"
                                                            aria-selected="true">
                                                            <div class="checkout-card-img">
                                                                <img src="{{asset('assets/img/payment/mastercard.svg')}}" alt="">
                                                                <img src="{{asset('assets/img/payment/visa.svg')}}" alt="">
                                                                <img src="{{asset('assets/img/payment/amex.svg')}}" alt="">
                                                                <img src="{{asset('assets/img/payment/discover.svg')}}" alt="">
                                                            </div>
                                                            <span>Pay With Credit Card</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link" id="pills-tab-2" data-bs-toggle="pill"
                                                            data-bs-target="#pills-2" type="button" role="tab" aria-controls="pills-2"
                                                            aria-selected="false">
                                                            <div class="checkout-payment-img">
                                                                <img src="{{asset('assets/img/payment/paypal-2.svg')}}" alt="">
                                                            </div>
                                                            <span>Pay With PayPal</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link" id="pills-tab-3" data-bs-toggle="pill"
                                                            data-bs-target="#pills-3" type="button" role="tab" aria-controls="pills-3"
                                                            aria-selected="false">
                                                            <div class="checkout-payment-img">
                                                                <img src="{{asset('assets/img/payment/payoneer.svg')}}" alt="">
                                                            </div>
                                                            <span>Pay With Payoneer</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link" id="pills-tab-4" data-bs-toggle="pill"
                                                            data-bs-target="#pills-4" type="button" role="tab" aria-controls="pills-4"
                                                            aria-selected="false">
                                                            <div class="checkout-payment-img cod">
                                                                <img src="{{asset('assets/img/payment/cod-3.svg')}}" alt="">
                                                            </div>
                                                            <span>Cash On Delivery</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content" id="pills-tabContent">
                                                    <div class="tab-pane fade show active" id="pills-1" role="tabpanel"
                                                        aria-labelledby="pills-tab-1" tabindex="0">
                                                        <div class="shop-checkout-form">
                                                            <form action="#">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Card Holder Name</label>
                                                                            <input type="text" class="form-control" placeholder="Name On Card">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Card Number</label>
                                                                            <input type="text" class="form-control" placeholder="Your Card Number">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Expire Date</label>
                                                                            <input type="text" class="form-control" placeholder="Expire">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>CCV</label>
                                                                            <input type="text" class="form-control" placeholder="CVV">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <button type="button" class="theme-btn theme-btn2"><span class="fas fa-arrow-left"></span>Previous</button>
                                                                        <button type="submit" class="theme-btn">Pay Now<i class="fas fa-arrow-right"></i></button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="pills-2" role="tabpanel"
                                                        aria-labelledby="pills-tab-2" tabindex="0">
                                                        <div class="shop-checkout-form">
                                                            <form action="#">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Email Address</label>
                                                                            <input type="text" class="form-control" placeholder="Email">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Password</label>
                                                                            <input type="password" class="form-control" placeholder="Password">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <button type="submit" class="theme-btn">Login Account<i
                                                                            class="fas fa-arrow-right"></i></button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="pills-3" role="tabpanel"
                                                        aria-labelledby="pills-tab-3" tabindex="0">
                                                        <div class="shop-checkout-form">
                                                            <form action="#">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Email Address</label>
                                                                            <input type="text" class="form-control" placeholder="Email">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Password</label>
                                                                            <input type="password" class="form-control" placeholder="Password">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <button type="submit" class="theme-btn">Login Account<i
                                                                            class="fas fa-arrow-right"></i></button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="pills-4" role="tabpanel"
                                                        aria-labelledby="pills-tab-4" tabindex="0">
                                                        <div class="shop-checkout-form cod">
                                                            <form action="#">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="form-check mb-20">
                                                                            <input class="form-check-input" type="checkbox" value="" id="cod">
                                                                            <label class="form-check-label" for="cod">
                                                                                Cash On Delivery
                                                                                <span>Please read our <a href="#">Terms And Conditions</a> for cash on delivery.</span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="shop-cart-summary">
                                <h5>Cart Summary</h5>
                                <ul>
                                    <li><strong>Sub Total:</strong> <span class="cart-subtotal">₹{{$subtotal}}</span></li>
                                    {{-- <li><strong>Discount:</strong> <span id="cart-discount">₹5.00</span></li>
                                    <li><strong>Shipping:</strong> <span id="cart-shipping">Free</span></li> --}}
                                    <li><strong>GST ( 18% ) :</strong> <span class="cart-taxes">₹{{$taxes}}</span></li>
                                    <li class="shop-cart-total"><strong>Total:</strong> <span class="cart-total">₹{{$total}}</span></li>
                                    <input type="hidden" name="total" value="{{$total}}">
                                </ul>
                                <div class="text-end mt-40">                            
                                        <input type="submit" value="Checkout Now" class="theme-btn" >                                   
                                </div>
                            </div>
                        </div> 
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- shop checkout end -->

</main>

@endsection