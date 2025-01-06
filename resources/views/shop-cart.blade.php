@extends('layout')

@section('content')
 
 <!-- popup search -->
 <div class="search-popup">
    <button class="close-search"><span class="far fa-times"></span></button>
    <form action="#">
        <div class="form-group">
            <input type="search" name="search-field" class="form-control" placeholder="Search Here..." required>
            <button type="submit"><i class="far fa-search"></i></button>
        </div>
    </form>
</div>
<!-- popup search end -->


<main class="main">

    <!-- breadcrumb -->
    <div class="site-breadcrumb">
        <div class="site-breadcrumb-bg" style="background: url({{asset('assets/img/breadcrumb/01.jpg')}})"></div>
        <div class="container">
            <div class="site-breadcrumb-wrap">
                <h4 class="breadcrumb-title">Shop Cart</h4>
                <ul class="breadcrumb-menu">
                    <li><a href="index.php"><i class="far fa-home"></i> Home</a></li>
                    <li class="active">Shop Cart</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->


    <!-- shop cart -->
    <div class="shop-cart pt-100 pb-50">
        <div class="container">
            <div class="shop-cart-wrap">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart-table">
                            <div class="table-responsive">
                                <table class="table" id="cartTable">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Sub Total</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                        @if(empty($addtocart))
                                        <tr>
                                            <td colspan="5" class="text-center">No products in the cart</td>
                                        </tr>
                                        @else
                                        @foreach ($addtocart as $item)
                                        <tr data-product-id="{{ $item['item_id'] }}">
                                            <input type="hidden" id="updated_p_Id" value="{{ $item['item_id'] }}" >
                                            <td>
                                                <div class="shop-cart-img">
                                                    <a href="#"><img src="{{ asset('storage/product-images/' . $item['product_image']) }}" alt=""></a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="shop-cart-content">
                                                    <h5 class="shop-cart-name"><a href="#">{{ $item['product_name'] }}</a></h5>
                                                    <div class="shop-cart-info">
                                                        <p class="updated_size" ><span>Size:</span>{{$item['size']}}</p>
                                                        <p class="updated_color"><span>Color:</span> {{$item['color']}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="shop-cart-price">
                                                    <span class="item-price">&#8377;{{ $item['product_price'] }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="shop-cart-qty">
                                                    <button class="minus-btn updateQty"><i class="fal fa-minus"></i></button>
                                                    <input class="quantity" type="text" value="{{ $item['qty'] }}" disabled="">
                                                    <button class="plus-btn updateQty"><i class="fal fa-plus"></i></button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="shop-cart-subtotal">
                                                    <span class="item-subtotal" >&#8377;{{ $item['sub_total'] }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#" class="shop-cart-remove" value={{$item['item_id']}} ><i class="far fa-times"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <!-- <div class="shop-cart-footer">
                            <div class="row">
                                <div class="col-md-2 col-lg-6">
                                    <div class="shop-cart-btn text-md-end">
                                        <a href="#" class="theme-btn"><span class="fas fa-arrow-left"></span> Continue Shopping</a>
                                    </div>
                                </div>
                                <div class="col-md-7 col-lg-6">
                                    <div class="shop-cart-coupon">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Your Coupon Code">
                                            <button class="theme-btn" type="submit">Apply Coupon</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="col-lg-4">
                        <div class="shop-cart-summary">
                            <h5>Cart Summary</h5>
                            <form action="{{route('shop-checkout')}}" method="post">
                                @csrf
                            <ul>
                                <li><strong>Sub Total:</strong> <span id="cart-subtotal">₹00.00</span></li>
                                <input type="text" hidden name="cart-subtotal" id="cart-subtotal-1">
                                {{-- <li><strong>Discount:</strong> <span id="cart-discount">₹5.00</span></li>
                                <li><strong>Shipping:</strong> <span id="cart-shipping">Free</span></li> --}}
                                <li><strong>GST ( 18% ) :</strong> <span id="cart-taxes">₹00.00</span></li>
                                <input type="text" name="cart-taxes" hidden id="cart-taxes-1">
                                <li class="shop-cart-total"><strong>Total:</strong> <span id="cart-total">₹00.00</span></li>
                                <input type="text" name="cart-total" hidden id="cart-total-1">

                            </ul>
                            <div class="text-end mt-40">
                                <input type="submit" class="theme-btn checkOutBtn" value="Checkout Now">
                                {{-- <a href="" class="theme-btn checkOutBtn">Checkout Now<i class="fas fa-arrow-right"></i></a> --}}
                            </div>
                        </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- shop cart end -->

</main>

@endsection