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
                <h4 class="breadcrumb-title">404 Error</h4>
                <ul class="breadcrumb-menu">
                    <li><a href="index.php"><i class="far fa-home"></i> Home</a></li>
                    <li class="active">404 Error</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->


    <!-- error area -->
    <div class="error-area py-100">
        <div class="container">
            <div class="col-md-6 mx-auto">
                <div class="error-wrapper">
                    <div class="error-img">
                        <img src="{{asset('assets/img/error/01.png')}}" alt="">
                    </div>
                    <h2>Opos... Page Not Found!</h2>
                    <p>The page you looking for not found may be it not exist or removed.</p>
                    <a href="index.php" class="theme-btn">Go Back Home <i class="far fa-home"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- error area end -->

</main>

@endsection