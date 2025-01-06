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

    <div class="user-area bg pt-60 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="sidebar">
                        <div class="sidebar-top">
                            <div class="sidebar-profile-img">
                                <img src="{{asset('assets/img/dummy-profile.png')}}" alt="profile-image">
                            </div>
                            <h3>{{$user->first_name}} {{$user->last_name}}</h3>
                        </div>
                        <ul class="sidebar-list">
                            <li><a class="active" href="user-profile.php"><i class="far fa-user"></i> My Profile</a></li>
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
                                    <h4 class="user-card-title">Profile Info</h4>
                                    <div class="user-form">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>First Name</label>
                                                        <input type="text" class="form-control" value="{{$user->first_name}}"
                                                            placeholder="First Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Last Name</label>
                                                        <input type="text" class="form-control" value="{{$user->last_name}}"
                                                            placeholder="Last Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" class="form-control"
                                                            value="{{$user->email}}" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Phone</label>
                                                        <input type="text" class="form-control"
                                                            value="{{$user->phone}}" placeholder="Phone">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Address</label>
                                                        <input type="text" class="form-control"
                                                            value="{{$user->billing_local_area}} {{$user->billing_city}} {{$user->billing_state}} {{$user->billing_zip}}" placeholder="Address">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="theme-btn"><span class="far fa-user"></span> Save Changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="user-card">
                                    <h4 class="user-card-title">Change Password</h4>
                                    <div class="col-lg-12">
                                        <div class="user-form">
                                            <form action="{{ route('password.update') }}" method="POST">
                                                @csrf
                                                @method('put')
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Old Password</label>
                                                            <input name="current_password" type="password" class="form-control"
                                                                placeholder="Old Password">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>New Password</label>
                                                            <input name="password" type="password" class="form-control"
                                                                placeholder="New Password">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Confirm Password</label>
                                                            <input name="password_confirmation" type="password" class="form-control"
                                                                placeholder="Re-Type Password">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="theme-btn"><span class="far fa-key"></span> Change Password</button>
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
    </div>        
    <!-- user dashboard end -->

</main>

@endsection