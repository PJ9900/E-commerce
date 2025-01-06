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
                                            <h4 class="user-card-title">My Orders List</h4>
                                            <!-- <div class="user-card-header-right">
                                                <div class="user-card-filter">
                                                    <select class="select">
                                                        <option value="">Default</option>
                                                        <option value="1">Pending</option>
                                                        <option value="2">Processing</option>
                                                        <option value="3">Cancelled</option>
                                                        <option value="4">Completed</option>
                                                    </select>
                                                </div>
                                                <div class="user-card-search">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Search...">
                                                        <i class="far fa-search"></i>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-borderless text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>#Order No</th>
                                                        <th>Purchased Date</th>
                                                        <th>Total</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($results->isEmpty())
                                                    <tr>
                                                        <td colspan="5" class="text-center">No orders</td>
                                                    </tr>
                                                    @else
                                                    @foreach ($results as $item)
                                                        <tr>
                                                            <td><span class="table-list-code">{{$item->id}}</span></td>
                                                            <td>{{$item->OrderDate}}</td>                                                       
                                                            <td>&#8377; {{$item->paid_amount}}</td>                                                          
                                                            <td><span class="badge badge-info">{{$item->OrderStatus}}</span></td>
                                                            {{-- <td>
                                                                <a href="{{route('order-detail',['id' => $item->id])}}" class="btn btn-outline-secondary btn-sm rounded-2" data-tooltip="tooltip" title="Details">
                                                                    <i class="far fa-eye"></i>
                                                                </a>
                                                            </td> --}}
                                                        </tr>
                                                    @endforeach
                                                @endif
                                                    {{-- <tr>
                                                        <td><span class="table-list-code">#28VR5K59</span></td>
                                                        <td>August 20, 2024</td>
                                                        <td>&#8377;3,650</td>
                                                        <td><span class="badge badge-primary">Processing</span></td>
                                                        <td>
                                                            <a href="order-detail.php" class="btn btn-outline-secondary btn-sm rounded-2" data-tooltip="tooltip" title="Details"><i class="far fa-eye"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span class="table-list-code">#28VR5K59</span></td>
                                                        <td>August 20, 2024</td>
                                                        <td>&#8377;3,650</td>
                                                        <td><span class="badge badge-success">Completed</span></td>
                                                        <td>
                                                            <a href="order-detail.php" class="btn btn-outline-secondary btn-sm rounded-2" data-tooltip="tooltip" title="Details"><i class="far fa-eye"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span class="table-list-code">#28VR5K59</span></td>
                                                        <td>August 20, 2024</td>
                                                        <td>&#8377;3,650</td>
                                                        <td><span class="badge badge-danger">Cancelled</span></td>
                                                        <td>
                                                            <a href="order-detail.php" class="btn btn-outline-secondary btn-sm rounded-2" data-tooltip="tooltip" title="Details"><i class="far fa-eye"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span class="table-list-code">#28VR5K59</span></td>
                                                        <td>August 20, 2024</td>
                                                        <td>&#8377;3,650</td>
                                                        <td><span class="badge badge-success">Completed</span></td>
                                                        <td>
                                                            <a href="order-detail.php" class="btn btn-outline-secondary btn-sm rounded-2" data-tooltip="tooltip" title="Details"><i class="far fa-eye"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span class="table-list-code">#28VR5K59</span></td>
                                                        <td>August 20, 2024</td>
                                                        <td>&#8377;3,650</td>
                                                        <td><span class="badge badge-success">Completed</span></td>
                                                        <td>
                                                            <a href="order-detail.php" class="btn btn-outline-secondary btn-sm rounded-2" data-tooltip="tooltip" title="Details"><i class="far fa-eye"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span class="table-list-code">#28VR5K59</span></td>
                                                        <td>August 20, 2024</td>
                                                        <td>&#8377;3,650</td>
                                                        <td><span class="badge badge-success">Completed</span></td>
                                                        <td>
                                                            <a href="order-detail.php" class="btn btn-outline-secondary btn-sm rounded-2" data-tooltip="tooltip" title="Details"><i class="far fa-eye"></i></a>
                                                        </td>
                                                    </tr> --}}
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