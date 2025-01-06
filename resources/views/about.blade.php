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
            <div class="site-breadcrumb-bg" style="background: url({{ asset('assets/img/breadcrumb/01.jpg') }})"></div>
            <div class="container">
                <div class="site-breadcrumb-wrap">
                    <h4 class="breadcrumb-title">About Us</h4>
                    <ul class="breadcrumb-menu">
                        <li><a href="{{ route('index') }}"><i class="far fa-home"></i> Home</a></li>
                        <li class="active">About Us</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- breadcrumb end -->

        <!-- about area -->
        <div class="about-area pt-50 pb-50">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-left wow fadeInLeft" data-wow-delay=".25s">
                            <div class="about-img">
                                <img class="img-1" src="{{ asset('assets/img/3d-mattress-with-clouds.webp') }}" alt="">
                            </div>
                            <div class="about-shape">
                                <img src="{{ asset('assets/img/shape/01.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-right wow fadeInRight" data-wow-delay=".25s">
                            <div class="site-heading mb-3">
                                <span class="site-title-tagline justify-content-start">
                                    <i class="flaticon-drive"></i> About Us
                                </span>
                                <h2 class="site-title">
                                    We Provide Best <span>Mattresses</span></h2>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt quas iure repudiandae
                                dolor nostrum dicta beatae reprehenderit ad! Fugit aliquam necessitatibus magni, natus
                                vero cumque impedit dolorem dicta vitae tempore!
                            </p>
                            <div class="about-list">
                                <ul>
                                    <li><i class="fas fa-check-double"></i> lorem insum vitae dista ipsum</li>
                                    <li><i class="fas fa-check-double"></i> lorem insum vitae dista ipsum</li>
                                    <li><i class="fas fa-check-double"></i> lorem insum vitae dista ipsum</li>
                                    <li><i class="fas fa-check-double"></i> lorem insum vitae dista ipsum</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- about area end -->

        <!-- counter area -->
        <div class="counter-area pt-50 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="counter-box">
                            <div class="icon">
                                <img src="{{ asset('assets/img/icon/sale.svg') }}" alt="">
                            </div>
                            <div class="counter-info">
                                <div class="counter-amount">
                                    <span class="counter" data-count="+" data-to="50" data-speed="3000">50</span>
                                    <span class="counter-sign">k</span>
                                </div>
                                <h6 class="title">Total Sales </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="counter-box">
                            <div class="icon">
                                <img src="{{ asset('assets/img/icon/rate.svg') }}" alt="">
                            </div>
                            <div class="counter-info">
                                <div class="counter-amount">
                                    <span class="counter" data-count="+" data-to="90" data-speed="3000">90</span>
                                    <span class="counter-sign">k</span>
                                </div>
                                <h6 class="title">Happy Clients</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="counter-box">
                            <div class="icon">
                                <img src="{{ asset('assets/img/icon/employee.svg') }}" alt="">
                            </div>
                            <div class="counter-info">
                                <div class="counter-amount">
                                    <span class="counter" data-count="+" data-to="150" data-speed="3000">150</span>
                                    <span class="counter-sign">+</span>
                                </div>
                                <h6 class="title">Team Workers</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="counter-box">
                            <div class="icon">
                                <img src="{{ asset('assets/img/icon/award.svg') }}" alt="">
                            </div>
                            <div class="counter-info">
                                <div class="counter-amount">
                                    <span class="counter" data-count="+" data-to="30" data-speed="3000">30</span>
                                    <span class="counter-sign">+</span>
                                </div>
                                <h6 class="title">Win Awards</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- counter area end -->

        <!-- Mission area -->
        <div class="about-area py-120 mt-30 mb-30">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-right wow fadeInRight" data-wow-delay=".25s">
                            <div class="site-heading mb-3">
                                <span class="site-title-tagline justify-content-start">
                                    <i class="flaticon-drive"></i> Our Mission
                                </span>
                                <h2 class="site-title">
                                    We Provide Best <span>Mattresses</span></h2>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt quas iure repudiandae
                                dolor nostrum dicta beatae reprehenderit ad! Fugit aliquam necessitatibus magni, natus
                                vero cumque impedit dolorem dicta vitae tempore!
                            </p>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iste deserunt quisquam, nihil
                                ducimus aliquid quasi veniam maiores architecto amet in officiis impedit, assumenda
                                voluptatum eaque iusto vero facilis nam debitis.</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita sapiente excepturi in
                                suscipit omnis autem? Delectus esse perferendis quam maxime suscipit veritatis neque?
                                Debitis ipsam saepe deserunt sed eligendi reiciendis!</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-left wow fadeInLeft" data-wow-delay=".25s">
                            <div class="about-img">
                                <img class="img-1" src="{{ asset('assets/img/3d-mattress-with-clouds.webp') }}" alt="">
                            </div>
                            <div class="about-shape">
                                <img src="{{ asset('assets/img/shape/01.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mission area end -->

        <!-- testimonial area -->
        <div class="testimonial-area bg ts-bg py-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto wow fadeInDown" data-wow-delay=".25s">
                        <div class="site-heading text-center">
                            <span class="site-title-tagline">Testimonials</span>
                            <h2 class="site-title">What Our Client <span>Say's</span></h2>
                        </div>
                    </div>
                </div>
                <div class="testimonial-slider owl-carousel owl-theme wow fadeInUp" data-wow-delay=".25s">
                    <div class="testimonial-item">
                        <div class="testimonial-author">
                            <div class="testimonial-author-img">
                                <img src="{{ asset('assets/img/dummy-profile.png') }}" alt="">
                            </div>
                            <div class="testimonial-author-info">
                                <h4>Sweta Pandey</h4>
                                <p>Customer</p>
                            </div>
                        </div>
                        <div class="testimonial-quote">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae reiciendis a
                                laborum beatae sequi vitae esse odit culpa distinctio autem veniam similique
                                architecto commodi illo quos dolorum, excepturi debitis fugiat?
                            </p>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-author">
                            <div class="testimonial-author-img">
                                <img src="{{ asset('assets/img/dummy-profile.png') }}" alt="">
                            </div>
                            <div class="testimonial-author-info">
                                <h4>Vikas Rathi</h4>
                                <p>Customer</p>
                            </div>
                        </div>
                        <div class="testimonial-quote">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae reiciendis a
                                laborum beatae sequi vitae esse odit culpa distinctio autem veniam similique
                                architecto commodi illo quos dolorum, excepturi debitis fugiat?
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- testimonial area end -->
    </main>
@endsection
