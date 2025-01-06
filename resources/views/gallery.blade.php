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
                <h4 class="breadcrumb-title">Our Gallery</h4>
                <ul class="breadcrumb-menu">
                    <li><a href="index.php"><i class="far fa-home"></i> Home</a></li>
                    <li class="active">Our Gallery</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->


    <!-- gallery-area -->
    <div class="gallery-area py-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="site-heading text-center">
                        <span class="site-title-tagline">Our Gallery</span>
                        <h2 class="site-title">Let's Check Our Photo <span>Gallery</span></h2>
                    </div>
                </div>
            </div>
            <div class="row g-4 popup-gallery">
                <div class="col-md-4 col-lg-3">
                    <div class="gallery-item wow fadeInDown" data-wow-delay=".25s">
                        <div class="gallery-img">
                            <img src="{{asset('assets/img/3d-mattress-with-clouds.webp')}}" alt="">
                            <a class="popup-img gallery-link" href="{{asset('assets/img/3d-mattress-with-clouds.webp')}}"><i
                                    class="fal fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">
                    <div class="gallery-item wow fadeInUp" data-wow-delay=".25s">
                        <div class="gallery-img">
                            <img src="{{asset('assets/img/3d-mattress-with-clouds.webp')}}" alt="">
                            <a class="popup-img gallery-link" href="{{asset('assets/img/3d-mattress-with-clouds.webp')}}"><i
                                    class="fal fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">
                    <div class="gallery-item wow fadeInDown" data-wow-delay=".25s">
                        <div class="gallery-img">
                            <img src="{{asset('assets/img/3d-mattress-with-clouds.webp')}}" alt="">
                            <a class="popup-img gallery-link" href="{{asset('assets/img/3d-mattress-with-clouds.webp')}}"><i
                                    class="fal fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">
                    <div class="gallery-item wow fadeInUp" data-wow-delay=".25s">
                        <div class="gallery-img">
                            <img src="{{asset('assets/img/3d-mattress-with-clouds.webp')}}" alt="">
                            <a class="popup-img gallery-link" href="{{asset('assets/img/3d-mattress-with-clouds.webp')}}"><i
                                    class="fal fa-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- gallery-area end -->

</main>

@endsection