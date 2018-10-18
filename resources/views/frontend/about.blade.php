@extends('layouts.frontend')
@section('content')
<div class="inner-page-header">
    <div class="banner">
        <img src="{{asset('admin/images/image-gallery/thumb/3.jpg')}}" alt="Banner">
    </div>
    <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="header-page-locator">
                        <ul>
                            <li><a href="index.html">Home <i class="fa fa-compress" aria-hidden="true"></i> </a> About</li>
                        </ul>
                    </div>
                    <div class="header-page-title">
                        <h1>About</h1>
                    </div>
                    <div class="header-page-subtitle">
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                            <br>alteration in some form, by injected humou</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Inner Page Header serction end here -->
<!-- Home About Start Here -->
<div class="home-about-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h2 class="title2">{{$about->title}} </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <p>
                    {{$about->text}}
                </p>



            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <p><img src="{{asset('about/'.$about->image)}}" alt="News24 office"></p>
            </div>
        </div>
    </div>
</div>
<!-- Home Page team end  here -->
<!-- Footer Area Section Start Here -->

<!-- Start scrollUp  -->
<div id="return-to-top">
    <span>Top</span>
</div>
@endsection