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
            <div class="site-breadcrumb-bg" style="background: url({{asset('assets/img/breadcrumb/01.jpg')}}"></div>
            <div class="container">
                <div class="site-breadcrumb-wrap">
                    <h4 class="breadcrumb-title">Categories</h4>
                    <ul class="breadcrumb-menu">
                        <li><a href="{{route('index')}}"><i class="far fa-home"></i> Home</a></li>
                        <li class="active">{{$cat_name}}</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- breadcrumb end -->


        <!-- shop-area -->
        <div class="shop-area bg py-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="text-center mb-5">{{$cat_name}}</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shop-item-wrap item-3">
                            <div class="row g-4">
                                @foreach ($products as $item)
                                <div class="col-md-4 col-lg-3">
                                    <div class="product-item">
                                        <div class="product-img">
                                            {{-- <span class="type">Trending</span>  --}}
                                            <a href="{{route('products.detail',['slug' => $item->slug])}}"><img src="{{ asset('storage/product-images/' . $item->p_featured_photo) }}" alt=""></a>
                                            <div class="product-action-wrap">
                                                <div class="product-action">
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
                                                    <i class="far fa-eye"></i>
                                                 </a>
                                                    <a style="cursor: pointer" value="{{$item->id}}" class="myWishlistCheck" data-tooltip="tooltip" title="Add To Wishlist"><i class="far fa-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h3 class="product-title"><a href="#">{{$item->name}}</a></h3>
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
                                                <button type="button" class="product-cart-btn myQuickView" 
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
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                    
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- shop-area end -->

    </main>
   
@endsection