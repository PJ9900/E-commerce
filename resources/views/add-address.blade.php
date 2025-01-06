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
                                <img src="assets/img/dummy-profile.png" alt="profile-image">
                            </div>
                            <h3>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h3>
                        </div>
                        <ul class="sidebar-list">
                            <li><a class="active" href="{{ route('profile', ['id' => Auth::user()->id]) }}"><i class="far fa-user"></i> My Profile</a></li>
                            <li><a href="{{route('order.list')}}"><i class="far fa-shopping-bag"></i> My Order List </a></li>
                            <li><a href="{{route('add.address')}}"><i class="far fa-location-dot"></i> Address</a></li>
                            <li><a href="track-order.php"><i class="far fa-map-location-dot"></i> Track My Order</a></li>
                            <!-- Logout button with POST method -->
                            <li>
                                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                                    @csrf
                                  <button type="submit" class="btn btn-link">
                                       <i class="far fa-sign-out"></i> Logout
                                  </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="user-wrapper">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="user-card">
                                    <div class="user-card-header">
                                        <h4 class="user-card-title">Add New Address</h4>
                                        {{-- <div class="user-card-header-right">
                                            <a href="address-list.php" class="theme-btn"><span class="fas fa-arrow-left"></span>Address List</a>
                                        </div> --}}
                                    </div>
                                    <div class="user-form">
                                        <form action="{{route('store.address')}}" method="POST" >
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Local Area</label>
                                                        <input type="text" name="local_area" class="form-control" value="{{$address->billing_local_area}}" placeholder="First Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>City</label>
                                                        <input type="text" name="city" class="form-control" value="{{$address->billing_city}}" placeholder="Last Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>State</label>
                                                        <input type="text" name="state" class="form-control" value="{{$address->billing_state}}" placeholder="Email Address">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Zipcode</label>
                                                        <input type="text" name="zipcode" class="form-control" value="{{$address->billing_zip}}" placeholder="Phone Number">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Complete Address</label>
                                                        <input type="text" name="address" class="form-control" value="{{$address->billing_local_area}} {{$address->billing_city}} {{$address->billing_state}} {{$address->billing_zip}}" placeholder="Your Full Address">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="theme-btn"><span class="far fa-save"></span> Save Address</button>
                                        </form>
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