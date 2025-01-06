@include('header')


<body class="home-3">

    <!-- preloader -->
    <div class="preloader">
        <div class="loader-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- preloader end -->

    <!-- header area -->
    <header class="header">
        <!-- header top -->
        <div class="header-top">
            <div class="container">
                <div class="header-top-wrapper">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-6 col-xl-5">
                            <div class="header-top-left">
                                <ul class="header-top-list">
                                    <li>
                                        <p><i class="far fa-fire"></i> The Biggest Sale Ever 50% Off</p>
                                    </li>
                                    <li><a href="tel:+21236547898"><i class="far fa-headset"></i> +2 123 654 7898</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6 col-xl-7">
                            <div class="header-top-right">
                                <ul class="header-top-list">
                                    <li class="social">
                                        <div class="header-top-social">
                                            <span>Follow Us: </span>
                                            <a href="#"><i class="fab fa-facebook"></i></a>
                                            <a href="#"><i class="fab fa-x-twitter"></i></a>
                                            <a href="#"><i class="fab fa-instagram"></i></a>
                                            <a href="#"><i class="fab fa-linkedin"></i></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header top end -->


        <!-- navbar -->
        <div class="main-navigation">
            <nav class="navbar navbar-expand-lg">
                <div class="container position-relative">
                    <a class="navbar-brand" href="{{route('index')}}">
                        <img src="{{asset('assets/img/logo/Home_Core_Logo_page.jpg')}}" alt="logo">
                    </a>
                    <div class="mobile-menu-right">
                        <div class="mobile-menu-btn">
                            <a href="{{route('wishlist')}}" class="nav-right-link"><i class="far fa-heart"></i><span id="wishlist-count">{{ count(json_decode(request()->cookie('wishlist'), true) ?? []) }}</span>
                            </a>
                            <a href="{{route('shop-cart')}}" class="nav-right-link"><i
                                    class="far fa-shopping-bag"></i><span id="cart-count">{{ session('addtocart') ? array_sum(array_column(session('addtocart'), 'qty')) : 0 }}</span></a>
                        </div>
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                            aria-label="Toggle navigation">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                        aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">
                            <a href="{{route('index')}}" class="offcanvas-brand" id="offcanvasNavbarLabel">
                                <img src="{{asset('assets/img/logo/Home_Core_Logo_page.jpg')}}" alt="">
                            </a>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-lg-5">
                                <li class="nav-item"><a class="nav-link" href="{{route('index')}}">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{route('about')}}">About</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{route('shop')}}">Our Product</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{route('blog')}}">Blog</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{route('contact')}}">Contact</a></li>
                            </ul>
                            <!-- nav-right -->
                            <div class="nav-right">
                                <ul class="nav-right-list">
                                    <li>
                                        <a href="{{route('wishlist')}}" class="list-link"> 
                                            <i class="far fa-heart"></i><span id="wishlist-count">{{ count(json_decode(request()->cookie('wishlist'), true) ?? []) }}</span>
                                        </a>
                                    </li>
                                    <li class="dropdown-cart">
                                        
                                        <a href="{{route('shop-cart')}}" class="list-link shop-cart">
                                            <i class="far fa-shopping-bag"></i>     
                                            
                                            <span id="cart-count">{{ session('addtocart') ? array_sum(array_column(session('addtocart'), 'qty')) : 0 }}</span>

                                        </a>
                                    </li>
                                </ul>
                                <div class="nav-right-btn">
                                    @if (Auth::check())
                                    <a href="{{ route('profile', ['id' => Auth::user()->id]) }}" class="theme-btn theme-btn2">
                                        <span class="far fa-user-tie"></span>
                                        Profile
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" class="theme-btn theme-btn2">
                                        <span class="far fa-user-tie"></span>
                                        Login
                                    </a>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- navbar end -->

    </header>
 

    @yield('content')


    <!-- feature area -->
    <div class="feature-area2 pt-50 pb-50">
        <div class="container wow fadeInUp" data-wow-delay=".25s">
            <div class="feature-wrap">
                <div class="row g-0">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fal fa-truck"></i>
                            </div>
                            <div class="feature-content">
                                <h4>Free Delivery</h4>
                                <p>Orders Over &#8377;120</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fal fa-sync"></i>
                            </div>
                            <div class="feature-content">
                                <h4>Get Refund</h4>
                                <p>Within 30 Days Returns</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fal fa-wallet"></i>
                            </div>
                            <div class="feature-content">
                                <h4>Safe Payment</h4>
                                <p>100% Secure Payment</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fal fa-headset"></i>
                            </div>
                            <div class="feature-content">
                                <h4>24/7 Support</h4>
                                <p>Feel Free To Call Us</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- feature area end -->

  @include('footer')