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
                <h4 class="breadcrumb-title">My Wishlist</h4>
                <ul class="breadcrumb-menu">
                    <li><a href="index.php"><i class="far fa-home"></i> Home</a></li>
                    <li class="active">My Wishlist</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->


    <!-- user dashboard -->
    <div class="user-area bg pt-100 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="user-card">
                        <h4 class="user-card-title">My Wishlist</h4>
                        <div class="row g-4 mt-20 item-2 " id="exist_wishlist_products">
                            @if($products->isEmpty())
                            <p>Your wishlist is empty.</p>
                        @else
                                @foreach($products as $product)
                                <div class="col-md-4 col-lg-3 ">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <span class="type new">New</span>
                                            <a href="{{route('products.detail',['slug' => $product->slug])}}"><img src="{{ asset('storage/product-images/' . $product->p_featured_photo) }}" alt=""></a>
                                            <div class="product-action-wrap">
                                                <div class="product-action">
                                                    <a href="#" class="myQuickView product-cart-btn" 
                                                    type="button"
                                                    data-tooltip="tooltip"
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#quickview"
                                                    data-id="{{ $product->id }}" 
                                                    data-removeWishlist="remove_wishlist"
                                                    data-name="{{ $product->name }}"
                                                    data-description="{{ $product->description }}"
                                                    data-price="{{ $product->price }}"
                                                    data-image="{{ asset('storage/product-images/' . $product->p_featured_photo) }}"
                                                    data-slug="{{ $product->slug }}"
                                                    title="Add to Cart"><i class="far fa-eye"></i></a>
                                                    <a href="#" class="remove_from_wishlist"  data-bs-placement="top" data-tooltip="tooltip" data-id="{{$product->id}}"
                                                        title="Remove From Wishlist"><i class="far fa-xmark"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h3 class="product-title"><a href="shop-details.php">{{$product->name}}</a></h3>
                                            <div class="product-rate">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <div class="product-bottom">
                                                <div class="product-price">
                                                    <span>&#8377;{{$product->price}}</span>
                                                </div>
                                                <button type="button" class="product-cart-btn myQuickView" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#quickview"
                                                data-id="{{ $product->id }}" 
                                                data-name="{{ $product->name }}"
                                                data-description="{{ $product->description }}"
                                                data-price="{{ $product->price }}"
                                                data-image="{{ asset('storage/product-images/' . $product->p_featured_photo) }}"
                                                data-slug="{{ $product->slug }}" 
                                                title="Add To Cart" >
                                                    <i class="far fa-shopping-bag"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- user dashboard end -->

</main>

@endsection