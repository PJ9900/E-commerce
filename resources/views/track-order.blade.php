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



        <!-- user dashboard -->
        <div class="user-area bg pt-50 pb-50">
            <div class="container">
                <div class="row">
                <div class="col-lg-3">
                        <div class="sidebar">
                            <div class="sidebar-top">
                                <div class="sidebar-profile-img">
                                    <img src="{{asset('assets/img/dummy-profile.png')}}" alt="profile-image">
                                </div>
                                <h3>Antoni Jonson</h3>
                            </div>
                            <ul class="sidebar-list">
                                <li><a href="user-profile.php"><i class="far fa-user"></i> My Profile</a></li>
                                <li><a href="order-list.php"><i class="far fa-shopping-bag"></i> My Order List <span class="badge badge-danger">02</span></a></li>
                                <li><a href="address-list.php"><i class="far fa-location-dot"></i> Address List</a></li>
                                <li><a class="active" href="track-order.php"><i class="far fa-map-location-dot"></i> Track My Order</a></li>
                                <li><a href="#"><i class="far fa-sign-out"></i> Logout</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="user-wrapper">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="user-card user-track-order">
                                        <h4 class="user-card-title">Track My Order</h4>
                                        <div class="track-order-content">
                                            <h5>Tracking Order Number: <span>#28VR5K59</span></h5>
                                            <div class="track-order-info">
                                                <a href="#"><span>Shipped Via:</span> Express Shipping</a>
                                                <a href="#"><span>Status:</span> Checking Quality</a>
                                                <a href="#"><span>Expected Date:</span> August 27, 2024</a>
                                            </div>
                                            <div class="track-order-step">
                                                <div class="step-item completed">
                                                    <div class="step-icon">
                                                        <i class="fal fa-shopping-cart"></i>
                                                    </div>
                                                    <h6>Confirmed Order</h6>
                                                </div>
                                                <div class="step-item completed">
                                                    <div class="step-icon">
                                                        <i class="fal fa-cog"></i>
                                                    </div>
                                                    <h6>Processing Order</h6>
                                                </div>
                                                <div class="step-item completed">
                                                    <div class="step-icon">
                                                        <i class="fal fa-check-circle"></i>
                                                    </div>
                                                    <h6>Quality Check</h6>
                                                </div>
                                                <div class="step-item">
                                                    <div class="step-icon">
                                                        <i class="fal fa-truck-fast"></i>
                                                    </div>
                                                    <h6>Product Dispatched</h6>
                                                </div>
                                                <div class="step-item">
                                                    <div class="step-icon">
                                                        <i class="fal fa-home"></i>
                                                    </div>
                                                    <h6>Product Delivered</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- user dashboard end -->
    
    </main>

@endsection