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
                            <li><a href="index.html">Home <i class="fa fa-compress" aria-hidden="true"></i> </a> Testimonial</li>
                        </ul>
                    </div>
                    <div class="header-page-title">
                        <h1>Testimonial</h1>
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

<!-- Testimonial Page Start Here -->
<div class="testimonial-page-area">
    <div class="container">
        <div class="row">
            @foreach($testimonails as $testimonail)
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <ul>
                        <li>
                            <div class="testimonial-content">
                                <div class="talk-bubble tri-right border round btm-left-in">
                                    <p>{{$testimonail->message}}</p>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <div class="author-image">
                                        <img src="{{asset('testimonails/'.$testimonail->image)}}" alt="Testimonial photo">
                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                    <div class="author-name">
                                        // {{$testimonail->name}} <span>{{$testimonail->company}}</span></div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                @endforeach


        </div>

    </div>
</div>
@endsection