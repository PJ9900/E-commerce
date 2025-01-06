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
                    <h4 class="breadcrumb-title">Blog Details</h4>
                    <ul class="breadcrumb-menu">
                        <li><a href="{{route('index')}}"><i class="far fa-home"></i> Home</a></li>
                        <li><a href="{{route('blog')}}">Blogs</a></li>
                        <li class="active">Blog Details</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- breadcrumb end -->


        <!-- blog area -->
        <div class="blog-area py-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog-single-wrap">
                            <div class="blog-single-content">
                                <div class="blog-thumb-img">
                                    <img src="{{asset('storage/blog-images/'.$blog->banner)}}" alt="{{$blog->image_alt}}">
                                </div>
                                <div class="blog-info">
                                    <div class="blog-meta">
                                        <div class="blog-meta-left">
                                            <ul>
                                                {{-- <li><i class="far fa-user"></i><a href="#">Jean R Gunter</a></li> --}}
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="blog-details">
                                        <h3 class="blog-details-title mb-20">{{$blog->title}}
                                        </h3>
                                        <p class="mb-10">{{strip_tags($blog->description)}}</p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <aside class="sidebar">
                            <!-- recent post -->
                            <div class="widget recent-post">
                                <h5 class="widget-title">Recent Post</h5>
                                @if ($blogs->isEmpty())
                                    <p>No recent blogs</p>
                                @else
                                @foreach ($blogs as $item)
                                <div class="recent-post-item">
                                    <div class="recent-post-img">
                                        <img src="{{asset('storage/blog-images/'.$item->banner)}}" alt="{{$item->image_alt}}">
                                    </div>
                                    <div class="recent-post-bio">
                                        <h6><a href="{{route('blogs.shop',['slug' => $item->slug])}}">{{$item->short_description}}</a></h6>
                                        <span><i class="far fa-clock"></i>{{ \Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}</span>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
        <!-- blog area end -->

    </main>

@endsection