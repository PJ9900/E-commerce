@extends('layout')

@section('content')

<main class="main">

    <!-- breadcrumb -->
    <div class="site-breadcrumb">
        <div class="site-breadcrumb-bg" style="background: url({{asset('assets/img/breadcrumb/01.jpg')}})"></div>
        <div class="container">
            <div class="site-breadcrumb-wrap">
                <h4 class="breadcrumb-title">Product Detail</h4>
                <ul class="breadcrumb-menu">
                    <li><a href="{{route('index')}}"><i class="far fa-home"></i> Home</a></li>
                    <li class="active">Product Detail</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->


    <!-- shop single -->
    <div class="shop-single py-90">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-lg-6 col-xxl-5">
                    <div class="shop-single-gallery">
                        <div class="flexslider-thumbnails">
                            <ul class="slides">
                                <li data-thumb="{{ asset('storage/product-images/' . $product->p_featured_photo) }}" rel="adjustX:10, adjustY:">
                                    <img src="{{ asset('storage/product-images/' . $product->p_featured_photo) }}" alt="#">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xxl-6">
                    <div class="shop-single-info">
                        <h4 class="shop-single-title">{{$product->name}}</h4>
                        <div class="shop-single-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                            <span class="rating-count"> (4 Customer Reviews)</span>
                        </div>
                        <div class="shop-single-price">
                            {{-- <del>&#8377;</del> --}}
                            <span class="amount">&#8377;{{$product->price}}</span>
                            {{-- <span class="discount-percentage">30% Off</span> --}}
                        </div>
                        <p class="mb-3">
                        {{$product->description}}
                        </p>
                        <div class="shop-single-cs">
                            <div class="row">
                                <input type="text" hidden name="prod_id" id="prod_id" value="{{$product->id}}" >
                                <div class="col-md-3 col-lg-4 col-xl-3">
                                    <div class="shop-single-size">
                                        <h6>Quantity</h6>
                                        <div class="shop-cart-qty">
                                            <button class="minus-btn-1"><i class="fal fa-minus"></i></button>
                                            <input class="quantity" type="text" value="1" disabled="">
                                            <button class="plus-btn-1"><i class="fal fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-lg-4 col-xl-3">
                                    <div class="shop-single-size">
                                        <h6>Size</h6>
                                        <select class="select">
                                            <option value="">Choose Size</option>
                                            <option value="xm">Extra Small</option>
                                            <option value="sm">Small</option>
                                            <option value="m">Medium</option>
                                            <option value="xl">Extra Large</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="shop-single-size shop-single-color">
                                        <h6>color</h6>
                                        <select class="select_color shop-checkbox-list color nice-select">
                                            <option class="option" value="">Choose Color</option>
                                            <option class="option" value="Red">Red</option>
                                            <option class="option" value="Blue">Blue</option>
                                            <option class="option" value="Black">Black</option>
                                            <option class="option" value="White">White</option>
                                            <option class="option" value="Orange">Orange</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="shop-single-sortinfo">
                            <ul>
                                <li>SKU: <span>656TYTR</span></li>
                                <li>Category: <span>Living Room</span></li>
                                <li>Brand: <a href="#">Novak</a></li>
                            </ul>
                        </div> --}}
                        <div class="shop-single-action">
                            <div class="row align-items-center">
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="shop-single-btn">
                                        <a href="#" value="{{$product->id}}" class="theme-btn addToCartFunctionality"><span class="far fa-shopping-bag"></span>Add
                                            To Cart</a>
                                        <a href="#" value="{{$product->id}}"  class="theme-btn theme-btn2 myWishlistCheck" data-tooltip="tooltip"
                                            title="Add To Wishlist"><span class="far fa-heart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- shop single details -->
            <div class="shop-single-details">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-tab1" data-bs-toggle="tab" data-bs-target="#tab1"
                            type="button" role="tab" aria-controls="tab1" aria-selected="true">Description</button>
                        <button class="nav-link" id="nav-tab2" data-bs-toggle="tab" data-bs-target="#tab2"
                            type="button" role="tab" aria-controls="tab2" aria-selected="false">Additional
                            Info</button>
                        
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="nav-tab1">
                        <div class="shop-single-desc">
                            <p>
                                {{ strip_tags($product->description)}} {{strip_tags($product->p_short_description)}} {{strip_tags($product->p_long_description)}}
                            </p>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="nav-tab2">
                        <div class="shop-single-additional">
                            <p>
                                {{strip_tags($product->additional_info)}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- shop single details end -->


            <!-- related item -->
            <div class="product-area related-item pt-40">
                <div class="container px-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="site-heading-inline">
                                <h2 class="site-title">Related Items</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4 item-2">
                        @if ($products_in_category->isEmpty())
                        <div class="col-md-6 col-lg-3">
                            <div class="product-item">
                                <p>No Related products</p>
                            </div>
                        </div>
                        @else
                        @foreach ($products_in_category as $item)
                        <div class="col-md-6 col-lg-3">
                            <div class="product-item">
                                <div class="product-img">
                                    {{-- <span class="type new">New</span> --}}
                                    <a href="{{route('products.detail',['slug' => $item->slug])}}"><img src="{{asset('storage/product-images/'.$item->p_featured_photo)}}" alt="{{$item->name}}"></a>
                                    <div class="product-action-wrap">
                                        {{-- <div class="product-action">
                                            <a href="#" 
                                            class="myQuickView" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#quickview"
                                            data-id="{{ $item->id }}" 
                                            data-name="{{ $item->name }}"
                                            data-description="{{ $item->description }}"
                                            data-price="{{ $item->price }}"
                                            data-image="{{ asset('storage/product-images/' . $item->p_featured_photo) }}"
                                            data-slug="{{ $item->slug }}"
                                            title="Quick View">
                                            <i class="far fa-eye"></i></a>
                                            <a href="#" value="{{$item->id}}" class="myWishlistCheck" data-tooltip="tooltip" title="Add To Wishlist"><i class="far fa-heart"></i></a>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3 class="product-title"><a href="{{route('products.detail',['slug' => $item->slug])}}">{{$item->name}}</a></h3>
                                    <div class="product-rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="product-bottom">
                                        <div class="product-price">
                                            <span>&#8377;{{$item->price}}</span>
                                        </div>
                                        {{-- <button type="button" class="product-cart-btn myQuickView" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#quickview"
                                        data-id="{{ $item->id }}" 
                                        data-name="{{ $item->name }}"
                                        data-description="{{ $item->description }}"
                                        data-price="{{ $item->price }}"
                                        data-image="{{ asset('storage/product-images/' . $item->p_featured_photo) }}"
                                        data-slug="{{ $item->slug }}" 
                                        title="Add To Cart" >
                                            <i class="far fa-shopping-bag"></i>
                                        </button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        {{-- <div class="col-md-6 col-lg-3">
                            <div class="product-item">
                                <div class="product-img">
                                    <span class="type hot">Hot</span>
                                    <a href="shop-single.html"><img src="{{asset('assets/img/3d-mattress-with-clouds.webp')}}" alt=""></a>
                                    <div class="product-action-wrap">
                                        <div class="product-action">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#quickview"
                                                data-bs-placement="right" data-tooltip="tooltip"
                                                title="Quick View"><i class="far fa-eye"></i></a>
                                            <a href="#" data-bs-placement="right" data-tooltip="tooltip"
                                                title="Add To Wishlist"><i class="far fa-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3 class="product-title"><a href="shop-single.html">Simple Denim Chair</a></h3>
                                    <div class="product-rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="product-bottom">
                                        <div class="product-price">
                                            <span>&#8377;100.00</span>
                                        </div>
                                        <button type="button" class="product-cart-btn" data-bs-placement="left"
                                            data-tooltip="tooltip" title="Add To Cart">
                                            <i class="far fa-shopping-bag"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="product-item">
                                <div class="product-img">
                                    <span class="type oos">Out Of Stock</span>
                                    <a href="shop-single.html"><img src="{{asset('assets/img/3d-mattress-with-clouds.webp')}}" alt=""></a>
                                    <div class="product-action-wrap">
                                        <div class="product-action">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#quickview"
                                                data-bs-placement="right" data-tooltip="tooltip"
                                                title="Quick View"><i class="far fa-eye"></i></a>
                                            <a href="#" data-bs-placement="right" data-tooltip="tooltip"
                                                title="Add To Wishlist"><i class="far fa-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3 class="product-title"><a href="shop-single.html">Simple Denim Chair</a></h3>
                                    <div class="product-rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="product-bottom">
                                        <div class="product-price">
                                            <span>&#8377;100.00</span>
                                        </div>
                                        <button type="button" class="product-cart-btn" data-bs-placement="left"
                                            data-tooltip="tooltip" title="Add To Cart">
                                            <i class="far fa-shopping-bag"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="product-item">
                                <div class="product-img">
                                    <span class="type discount">10% Off</span>
                                    <a href="shop-single.html"><img src="{{asset('assets/img/3d-mattress-with-clouds.webp')}}" alt=""></a>
                                    <div class="product-action-wrap">
                                        <div class="product-action">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#quickview"
                                                data-bs-placement="right" data-tooltip="tooltip"
                                                title="Quick View"><i class="far fa-eye"></i></a>
                                            <a href="#" data-bs-placement="right" data-tooltip="tooltip"
                                                title="Add To Wishlist"><i class="far fa-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3 class="product-title"><a href="shop-single.html">Simple Denim Chair</a></h3>
                                    <div class="product-rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="product-bottom">
                                        <div class="product-price">
                                            <del>&#8377;120.00</del>
                                            <span>&#8377;100.00</span>
                                        </div>
                                        <button type="button" class="product-cart-btn" data-bs-placement="left"
                                            data-tooltip="tooltip" title="Add To Cart">
                                            <i class="far fa-shopping-bag"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <!-- related item end -->
        </div>
    </div>
    <!-- shop single end -->

</main>

@endsection