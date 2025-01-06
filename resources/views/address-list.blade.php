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
                                        <h4 class="user-card-title">Address List</h4>
                                        <div class="user-card-header-right">
                                            <a href="add-address.php" class="theme-btn"><span class="far fa-plus-circle"></span>Add Address</a>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-borderless text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Address</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><span class="table-list-code">Antoni</span></td>
                                                    <td>25/B Milford Road, New York</td>
                                                    <td><a href="https://live.themewild.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="72131c061d1c1b32170a131f021e175c111d1f">[email&#160;protected]</a></td>
                                                    <td>(+02) 123 4687 456</td>
                                                    <td>
                                                        <a href="#" class="btn btn-outline-secondary btn-sm rounded-2" data-tooltip="tooltip" title="Edit"><i class="far fa-pen"></i></a>
                                                        <a href="#" class="btn btn-outline-danger btn-sm rounded-2" data-tooltip="tooltip" title="Delete"><i class="far fa-trash-can"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span class="table-list-code">Antoni</span></td>
                                                    <td>25/B Milford Road, New York</td>
                                                    <td><a href="https://live.themewild.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="7a1b140e1514133a1f021b170a161f54191517">[email&#160;protected]</a></td>
                                                    <td>(+02) 123 4687 456</td>
                                                    <td>
                                                        <a href="#" class="btn btn-outline-secondary btn-sm rounded-2" data-tooltip="tooltip" title="Edit"><i class="far fa-pen"></i></a>
                                                        <a href="#" class="btn btn-outline-danger btn-sm rounded-2" data-tooltip="tooltip" title="Delete"><i class="far fa-trash-can"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span class="table-list-code">Antoni</span></td>
                                                    <td>25/B Milford Road, New York</td>
                                                    <td><a href="https://live.themewild.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="7c1d12081312153c19041d110c1019521f1311">[email&#160;protected]</a></td>
                                                    <td>(+02) 123 4687 456</td>
                                                    <td>
                                                        <a href="#" class="btn btn-outline-secondary btn-sm rounded-2" data-tooltip="tooltip" title="Edit"><i class="far fa-pen"></i></a>
                                                        <a href="#" class="btn btn-outline-danger btn-sm rounded-2" data-tooltip="tooltip" title="Delete"><i class="far fa-trash-can"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span class="table-list-code">Antoni</span></td>
                                                    <td>25/B Milford Road, New York</td>
                                                    <td><a href="https://live.themewild.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="8beae5ffe4e5e2cbeef3eae6fbe7eea5e8e4e6">[email&#160;protected]</a></td>
                                                    <td>(+02) 123 4687 456</td>
                                                    <td>
                                                        <a href="#" class="btn btn-outline-secondary btn-sm rounded-2" data-tooltip="tooltip" title="Edit"><i class="far fa-pen"></i></a>
                                                        <a href="#" class="btn btn-outline-danger btn-sm rounded-2" data-tooltip="tooltip" title="Delete"><i class="far fa-trash-can"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span class="table-list-code">Antoni</span></td>
                                                    <td>25/B Milford Road, New York</td>
                                                    <td><a href="https://live.themewild.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="ddbcb3a9b2b3b49db8a5bcb0adb1b8f3beb2b0">[email&#160;protected]</a></td>
                                                    <td>(+02) 123 4687 456</td>
                                                    <td>
                                                        <a href="#" class="btn btn-outline-secondary btn-sm rounded-2" data-tooltip="tooltip" title="Edit"><i class="far fa-pen"></i></a>
                                                        <a href="#" class="btn btn-outline-danger btn-sm rounded-2" data-tooltip="tooltip" title="Delete"><i class="far fa-trash-can"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
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