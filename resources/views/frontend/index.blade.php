@extends('layouts.frontend')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-0">
                <div class="wrapper">
                    <!-- News Slider -->

                    <div class="ticker marg-botm">
                        @if(!$breaks->count()==0)
                        <div class="ticker-wrap">
                            <!-- News Slider Title -->
                            <div class="ticker-head up-case backg-colr col-md-2">Breaking News <i class="fa fa-angle-double-right" aria-hidden="true"></i></div>
                            <div class="tickers col-md-10">
                                <div id="top-news-slider" class="owl-carousel ">
                                    @foreach($breaks as $break)
                                    <div class="item">
                                    <a href="blog-single.html"> <img src="{{asset('posts/'.$break->images[0]->photo)}}" alt="news image"> <span>{{$break->title}}</span></a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        @endif

                    </div>
                    <!-- End News Slider -->
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 padding-0">
                <div class="slider-area">
                    <div class="bend niceties preview-2">
                        <div id="ensign-nivoslider" class="slides">
                           @if(isset($heads[1]))
                                @foreach($heads[1]  as $head)

                                    <img style="height: 538px" src="{{asset('posts/'.$head->images[0]->photo)}}" alt="" title="#{{$head->id}}" />
                                @endforeach
                            @endif
                        </div>
                        <!-- direction 2 -->
                        @if(isset($heads[1]))
                            @foreach($heads[1]  as $head)
                            <div id="{{$head->id}}" class="slider-direction">
                                <div class="slider-content t-cn s-tb slider-1">
                                    <div class="title-container s-tb-c">
                                        <div class="slider-botton">
                                            <ul>
                                                <li>
                                                    <a class="cat-link" href="category.html">{{$head->category->name}}</a>
                                                    <span class="date">
                                                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i>{{date('j M Y', strtotime($head->created_at))}}
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <h1 class="title1"><a href="blog.html">{{$head->title}}</a></h1>
                                        <div class="title2">{{$head->title}}</div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                        <!-- direction 2 -->
                    </div>
                </div>
            </div>
            <!-- Slider Area End Here-->
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 paddimg-left-none">
                <div class="slider-right">
                    <ul>
                        @if(isset($heads[0]))
                            @foreach($heads[0]  as $head)
                            <li style="height: 178px">
                                <div class="right-content">
                                    <span class="category"><a class="cat-link" href="blog.html">{{$head->category->name}}</a></span>
                                    <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true">{{date('j M Y', strtotime($head->created_at))}} </i> </span>
                                    <h3><a href="blog-single.html">{{$head->title}}</a></h3>
                                </div>
                                    <div class="right-image"><a href="blog-single.html"><img class="img-responsive thumbnail post-img-preview" src="{{asset('posts/'.$head->images[0]->photo)}}"></a></div>
                            </li>
                          @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Slider Section end Here -->
    <!-- All News Section Start Here -->


    <div class="all-news-area">
        <div class="container">
            <!-- latest news Start Here -->
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 tab-home">
                    <ul class="nav nav-tabs">
                        <li class="title-bg">Latest News</li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab1" class="tab-pane fade in active">
                            <div class="tab-top-content">
                               {{--@if(isset($posts[0]))--}}
                                {{--@foreach($posts[0]  as $post)--}}

                                {{--<img style="height: 538px" src="{{asset('posts/'.$post->images[0]->photo)}}" alt="" title="#{{$post->id}}" />--}}
                                {{--@endforeach--}}
                                {{--@endif--}}
                                @if(isset($latests[1]))
                                    @foreach($latests[1]  as $latest)
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 paddimg-right-none" style="height:286px;">
                                        <a href="blog-single.html"><img style="height: 100%;object-fit: cover;" src="{{asset('posts/'.$latest->images[0]->photo)}}" alt="sidebar image"></a>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 last-col">
                                        <span class="date"><a href="index.html#"><i class="fa fa-user-o" aria-hidden="true"></i> james Bond </a></span> <span class="comment"><a href="index.html#"><i class="fa fa-comment-o" aria-hidden="true"></i> {{date('j M Y', strtotime($latest->created_at))}}</a></span>
                                        <h3><a href="index.html#">Migrants Told: Stay in France or go back to your country</a></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc nisl risus, tristique diam id, blandit condimentum</p>
                                        <a href="blog-single.html" class="read-more hvr-bounce-to-right">Read More</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                            <div class="tab-bottom-content">
                                <div class="row">
                                    @if(isset($latests[0]))
                                        @foreach($latests[0]  as $latest)
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 tab-area">
                                        <div class="col-sm-12 col-xs-3 img-tab">
                                            <a href="blog-single.html"><img src="{{asset('posts/'.$latest->images[0]->photo)}}" alt="News image"></a>
                                        </div>
                                        <div class="col-sm-12 col-xs-9 img-content">
                                            <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"> </i>{{date('j M Y', strtotime($latest->created_at))}}</span>
                                            <h4><a href="blog-single.html">{{$latest->title}}</a></h4>
                                        </div>
                                    </div>
                                        @endforeach
                                    @endif
                                </div>

                            </div>
                        </div>
                        <div id="tab2" class="tab-pane fade">
                            <div class="tab-top-content">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 paddimg-right-none">
                                        <a href="blog-single.html"><img src="images/tab/7.jpg" alt="sidebar image"></a>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 last-col">
                                        <span class="date"><a href="index.html#"><i class="fa fa-user-o" aria-hidden="true"></i> james Bond </a></span> <span class="comment"><a href="index.html#"><i class="fa fa-comment-o" aria-hidden="true"></i> 50</a></span>
                                        <h3><a href="index.html#">Migrants Told: Stay in France or go back to your country</a></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc nisl risus, tristique diam id, blandit condimentum</p>
                                        <a href="blog-single.html" class="read-more hvr-bounce-to-right">READ MORE</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-bottom-content">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 tab-area">
                                        <div class="col-sm-12 col-xs-3 img-tab">
                                            <a href="blog-single.html"><img src="images/tab/2.jpg" alt="News image"></a>
                                        </div>
                                        <div class="col-sm-12 col-xs-9 img-content">
                                            <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> June 28, 2017</span>
                                            <h4><a href="blog-single.html">SIS puts fierce fight & bombing</a></h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 tab-area">
                                        <div class="col-sm-12 col-xs-3 img-tab">
                                            <a href="blog-single.html"><img src="images/tab/3.jpg" alt="News image"></a>
                                        </div>
                                        <div class="col-sm-12 col-xs-9 img-content">
                                            <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> June 28, 2017</span>
                                            <h4><a href="blog-single.html">SIS puts fierce fight & bombing</a></h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 tab-area">
                                        <div class="col-sm-12 col-xs-3 img-tab">
                                            <a href="blog-single.html"><img src="images/tab/2.jpg" alt="News image"></a>
                                        </div>
                                        <div class="col-sm-12 col-xs-9 img-content">
                                            <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> June 28, 2017</span>
                                            <h4><a href="blog-single.html">SIS puts fierce fight & bombing</a></h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 tab-area">
                                        <div class="col-sm-12 col-xs-3 img-tab">
                                            <a href="blog-single.html"><img src="images/tab/5.jpg" alt="News image"></a>
                                        </div>
                                        <div class="col-sm-12 col-xs-9 img-content">
                                            <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> June 28, 2017</span>

                                            <h4><a href="blog-single.html">SIS puts fierce fight & bombing</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab3" class="tab-pane fade">
                            <div class="tab-top-content">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 paddimg-right-none">
                                        <a href="blog-single.html"><img src="images/tab/8.jpg" alt="sidebar image"></a>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 last-col">
                                        <span class="date"><a href="index.html#"><i class="fa fa-user-o" aria-hidden="true"></i> james Bond </a></span> <span class="comment"><a href="index.html#"><i class="fa fa-comment-o" aria-hidden="true"></i> 50</a></span>
                                        <h3><a href="index.html#">Migrants Told: Stay in France or go back to your country</a></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc nisl risus, tristique diam id, blandit condimentum</p>
                                        <a href="index.html#" class="read-more hvr-bounce-to-right">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-bottom-content">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 tab-area">
                                        <div class="col-sm-12 col-xs-3 img-tab">
                                            <a href="blog-single.html"><img src="images/tab/2.jpg" alt="News image"></a>
                                        </div>
                                        <div class="col-sm-12 col-xs-9 img-content">
                                            <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> June 28, 2017</span>


                                            <h4><a href="index.html#">SIS puts fierce fight & bombing</a></h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 tab-area">
                                        <div class="col-sm-12 col-xs-3 img-tab">
                                            <a href="blog-single.html"><img src="images/tab/3.jpg" alt="News image"></a>
                                        </div>
                                        <div class="col-sm-12 col-xs-9 img-content">
                                            <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> June 28, 2017</span>
                                            <h4><a href="index.html#">SIS puts fierce fight & bombing</a></h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 tab-area">
                                        <div class="col-sm-12 col-xs-3 img-tab">
                                            <a href="blog-single.html"><img src="images/tab/3.jpg" alt="News image"></a>
                                        </div>
                                        <div class="col-sm-12 col-xs-9 img-content">
                                            <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> June 28, 2017</span>
                                            <h4><a href="index.html#">SIS puts fierce fight & bombing</a></h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 tab-area">
                                        <div class="col-sm-12 col-xs-3 img-tab">
                                            <a href="blog-single.html"><img src="images/tab/2.jpg" alt="News image"></a>
                                        </div>
                                        <div class="col-sm-12 col-xs-9 img-content">
                                            <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> June 28, 2017</span>
                                            <h4><a href="index.html#">SIS puts fierce fight & bombing</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab4" class="tab-pane fade">
                            <div class="tab-top-content">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 paddimg-right-none">
                                        <a href="blog-single.html"><img src="images/tab/1.jpg" alt="sidebar image"></a>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 last-col">
                                        <span class="date"><a href="index.html#"><i class="fa fa-user-o" aria-hidden="true"></i> james Bond </a></span> <span class="comment"><a href="index.html#"><i class="fa fa-comment-o" aria-hidden="true"></i> 50</a></span>
                                        <h3><a href="index.html#">Migrants Told: Stay in France or go back to your country</a></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc nisl risus, tristique diam id, blandit condimentum</p>
                                        <a href="index.html#" class="read-more hvr-bounce-to-right">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-bottom-content fadeInUp">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 tab-area">
                                        <div class="col-sm-12 col-xs-3 img-tab">
                                            <a href="blog-single.html"><img src="images/tab/2.jpg" alt="News image"></a>
                                        </div>
                                        <div class="col-sm-12 col-xs-9 img-content">
                                            <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> June 28, 2017</span>
                                            <h4><a href="index.html#">SIS puts fierce fight & bombing</a></h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 tab-area">
                                        <div class="col-sm-12 col-xs-3 img-tab">
                                            <a href="blog-single.html"><img src="images/tab/3.jpg" alt="News image"></a>
                                        </div>
                                        <div class="col-sm-12 col-xs-9 img-content">
                                            <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> June 28, 2017</span>

                                            <h4><a href="index.html#">SIS puts fierce fight & bombing</a></h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 tab-area">
                                        <div class="col-sm-12 col-xs-3 img-tab">
                                            <a href="blog-single.html"><img src="images/tab/2.jpg" alt="News image"></a>
                                        </div>
                                        <div class="col-sm-12 col-xs-9 img-content">
                                            <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> June 28, 2017</span>

                                            <h4><a href="index.html#">SIS puts fierce fight & bombing</a></h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 tab-area">
                                        <div class="col-sm-12 col-xs-3 img-tab">
                                            <a href="blog-single.html"><img src="images/tab/4.jpg" alt="News image"></a>
                                        </div>
                                        <div class="col-sm-12 col-xs-9 img-content">
                                            <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> June 28, 2017</span>

                                            <h4><a href="index.html#">SIS puts fierce fight & bombing</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab5" class="tab-pane fade">
                            <div class="tab-top-content">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 paddimg-right-none">
                                        <a href="blog-single.html"><img src="images/tab/7.jpg" alt="sidebar image"></a>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 last-col">
                                        <span class="date">james Bond </span><a href="index.html#"><i class="fa fa-heart-o" aria-hidden="true"></i> 50</a> <span class="comment"><a href="index.html#"><i class="fa fa-comment-o" aria-hidden="true"></i> 50</a></span>
                                        <h3><a href="index.html#">Migrants Told: Stay in France or go back to your country</a></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc nisl risus, tristique diam id, blandit condimentum</p>
                                        <a href="index.html#" class="read-more hvr-bounce-to-right">READ MORE</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-bottom-content fadeInUp">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 tab-area">
                                        <div class="col-sm-12 col-xs-3 img-tab">
                                            <a href="blog-single.html"><img src="images/tab/2.jpg" alt="News image"></a>
                                        </div>
                                        <div class="col-sm-12 col-xs-9 img-content">
                                            <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> June 28, 2017</span>
                                            <h4><a href="index.html#">SIS puts fierce fight & bombing</a></h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 tab-area">
                                        <div class="col-sm-12 col-xs-3 img-tab">
                                            <a href="blog-single.html"><img src="images/tab/3.jpg" alt="News image"></a>
                                        </div>
                                        <div class="col-sm-12 col-xs-9 img-content">
                                            <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> June 28, 2017</span>
                                            <h4><a href="index.html#">SIS puts fierce fight & bombing</a></h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 tab-area">
                                        <div class="col-sm-12 col-xs-3 img-tab">
                                            <a href="blog-single.html"><img src="images/tab/2.jpg" alt="News image"></a>
                                        </div>
                                        <div class="col-sm-12 col-xs-9 img-content">
                                            <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> June 28, 2017</span>

                                            <h4><a href="index.html#">SIS puts fierce fight & bombing</a></h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 tab-area">
                                        <div class="col-sm-12 col-xs-3 img-tab">
                                            <a href="blog-single.html"><img src="images/tab/4.jpg" alt="News image"></a>
                                        </div>
                                        <div class="col-sm-12 col-xs-9 img-content">
                                            <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> June 28, 2017</span>                       <h4><a href="index.html#">SIS puts fierce fight & bombing</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Trending news  here-->
                    <div class="trending-news separator-large">
                        <div class="row">
                            <div class="view-area">
                                <div class="col-sm-8">
                                    <h3 class="title-bg">Trending News</h3>
                                </div>
                                <div class="col-sm-4 text-right">
                                    <a href="index.html#">View More <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                @if(isset($trends[1]))
                                    @foreach($trends[1]  as $trend)
                                <div class="list-col">
                                    <a href="blog-single.html"> <img src="{{asset('posts/'.$head->images[0]->photo)}}" alt="" title="Trending image" /></a>
                                    <div class="dsc">
                                        <span class="date"> <i class="fa fa-calendar-check-o" aria-hidden="true"></i> {{date('j M Y', strtotime($trend->created_at))}}</span> <span class="comment"><a href="index.html#"><i class="fa fa-comment-o" aria-hidden="true"></i> 50</a></span>
                                        <h3><a href="blog-single.html">{{$trend->title}}</a></h3>
                                        <p>Blandit rutrum, erat et egestas ultricies, dolor tortor egestas enim, quiste rhoncus sem the purus eu sapien curabitur.</p>
                                    </div>
                                </div>
                                    @endforeach
                                    @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <ul class="news-post">
                                    @if(isset($trends[0]))
                                        @foreach($trends[0]  as $trend)
                                    <li>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content">
                                                <div class="item-post">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-3 col-xs-3 paddimg-right-none">
                                                            <a href="blog-single.html"> <img src="images/Trending/2.jpg" alt="" title="Trending image"></a>
                                                        </div>
                                                        <div class="col-lg-8 col-md-8 col-sm-9 col-xs-9">
                                                            <h4><a href="blog-single.html">{{$trend->title}}</a></h4>
                                                            <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>{{date('j M Y', strtotime($trend->created_at))}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--Start what’s hot now -->
                    <div class="hot-news">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="view-area">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <h3 class="title-bg">What’s hot now</h3>
                                        </div>
                                        <div class="col-sm-4 text-right">
                                            <a href="index.html#">View More <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="featured">
                                    <div class="blog-img">
                                        <a href="blog-single.html"><img src="images/hot-news/1.jpg" alt="" title="News image" /></a>
                                    </div>
                                    <div class="blog-content">
                                        <a href="category-sports.html" class="cat-link">Sports</a><span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> November 28, 2017</span>
                                        <h4><a href="index.html#">Car racer gives herself a mid-Event haicut</a></h4>
                                    </div>
                                </div>
                                <ul class="news-post news-feature-mb">
                                    <li>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-4">
                                                <a href="blog-single.html"><img src="images/hot-news/3.jpg" alt="News image" /></a>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-8 content">
                                                <h4><a href="index.html#">Clinton Campaign Jilted & Search Emails</a></h4>
                                                <span class="author"><a href="index.html#"><i class="fa fa-user-o" aria-hidden="true"></i> yeamin</a></span> <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> June 28, 2017</span>
                                                <span class="comment"><a href="index.html#"><i class="fa fa-comment-o" aria-hidden="true"></i> 50</a></span>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestib vitae libero vel purus tincidunt aliquet at nec erat. Mauris the diam, ultrices quis leo sed lacinia egestas.The wise man there always holds in these matters.</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-4">
                                                <a href="blog-single.html"><img src="images/hot-news/2.jpg" alt="News image" /></a>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-8 content">
                                                <h4><a href="index.html#">Aaron Rodgers Criticizes For</a></h4> <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> June 28, 2017</span>
                                                <span class="comment"><a href="index.html#"><i class="fa fa-comment-o" aria-hidden="true"></i> 50</a></span>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestib vitae libero vel purus tincidunt aliquet at nec erat. Mauris the diam, ultrices quis leo sed lacinia egestas.The wise man there always holds in these matters.</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-4">
                                                <a href="blog-single.html"><img src="images/hot-news/4.jpg" alt="News image" /></a>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-8 content">
                                                <h4><a href="index.html#">Detroit Natives Wary & Recovery Threatens</a></h4>
                                                <span class="author"><a href="index.html#"><i class="fa fa-user-o" aria-hidden="true"></i> yeamin</a></span> <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> June 28, 2017</span>
                                                <span class="comment"><a href="index.html#"><i class="fa fa-comment-o" aria-hidden="true"></i> 50</a></span>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestib vitae libero vel purus tincidunt aliquet at nec erat. Mauris the diam, ultrices quis leo sed lacinia egestas.The wise man there always holds in these matters.</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End what’s hot now -->
                </div>
                <!--Sidebar Start Here -->
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 paddimg-left-none sidebar-latest">
                    <!--Like Box Start Here -->
                    <div class="like-box">
                        <ul>
                            <li>
                                <a href="index.html#"><i class="fa fa-facebook" aria-hidden="true"></i> </a><span>210,956 <br />likes</span>
                            </li>
                            <li>
                                <a href="index.html#"><i class="fa fa-twitter" aria-hidden="true"></i> </a><span>350,580 <br />followers</span>
                            </li>
                            <li class="last">
                                <a href="index.html#"><i class="fa fa-rss" aria-hidden="true"></i> </a><span>210,956 <br />subscribers</span>
                            </li>
                        </ul>
                    </div>
                    <!--Like Box End Here -->

                    <!--Add Start Here -->
                    <div class="add-section">
                        <img src="images/add/2.jpg" alt="add image">
                    </div>
                    <!--Add Box End Here -->

                    <!--Newsletter Start Here -->
                    <div class="newsletter-info">
                        <form>
                            <fieldset>
                                <div class="form-group">
                                    <h4>Subscribe to Newsletter</h4>
                                    <div class="newsletter">
                                        <input class="form-control" placeholder="Email address..." type="text">
                                        <button class="btn-send" type="submit">Subscribe</button>
                                        <p>Get the latest news stories in your inbox</p>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>

                    <!--Newsletter End Here -->

                    <!--popular Post Start Here -->
                    <div class="sidebar popular">
                        <h3 class="title-bg">Popular Now</h3>
                        <ul>
                            @if(isset($populars[1]))
                                @foreach($populars[1]  as $popular)
                            <li>
                                <a href="category.html" class="category-btn hvr-bounce-to-right">{{$popular->category->name}}</a>
                                <div class="post-image"><img src="{{asset('posts/'.$popular->images[0]->photo)}}" alt="News image"></div>
                                <div class="content">
                                    <h4>
                                        <a href="index.html#">{{$popular->title}}</a>
                                    </h4>
                                    <span class="date">
                                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i> {{date('j M Y', strtotime($trend->created_at))}}
                                    </span>
                                </div>
                            </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>


                    <div class="hot-news popular-related">
                        <ul class="news-post">

                            @if(isset($populars[0]))
                                @foreach($populars[0]  as $popular)
                            <li>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content">
                                        <div class="item-post">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-3 paddimg-right-none" style="height:80px;">
                                                    <img  style="height: 100%;object-fit: cover;"  src="{{asset('posts/'.$popular->images[0]->photo)}}" alt="" title="News image">
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-9">
                                                    <h4><a href="index.html#"> {{$popular->title}}</a></h4>
                                                    <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>  {{date('j M Y', strtotime($trend->created_at))}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <!--popular Post End Here -->

                    <!--Recent comments Start Here -->
                    <div class="recent-comments separator-large">
                        <div id="comments-Carousel" class="carousel carousel-comments slide" data-ride="carousel">
                            <!-- Wrapper for slides -->
                            <!-- Left and right controls -->
                            <div class="next-prev-top">
                                <div class="row">
                                    <div class="col-sm-9 col-xs-9">
                                        <div class="view-area">
                                            <h3 class="title-bg">Recent Comments</h3>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-xs-3 next-prev">
                                        <a class="left news-control" href="index.html#comments-Carousel" data-slide="prev">
                                            <span class="news-arrow-left"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
                                        </a>
                                        <a class="right news-control" href="index.html#comments-Carousel" data-slide="next">
                                            <span class="news-arrow-right"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="dsc">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipe isicing elit, sed do they eiusmod tempor incidin dunt ut labore et dolore</p>
                                        <span>- Thesera Minton</span>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="dsc">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipe isicing elit, sed do they eiusmod tempor incidin dunt ut labore et dolore</p>
                                        <span>- Jon Min</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Recent comments Start Here -->
                    <!--Add Start Here -->
                    <div class="add-section add-section2">
                        <img src="images/add/3.jpg" alt="add image">
                    </div>
                    <!--Add Box End Here -->
                </div>
            </div>
        </div>
    </div>
    <!-- Fetuered videos Start Here -->
    <div class="fetuered-videos">
        <div class="container">
            <div class="row">
                <div class="view-area">
                    <div class="col-sm-12">
                        <h3 class="title-bg">Fetuered Videos</h3>
                    </div>
                </div>
            </div>
            <div id="featured-videos-section" class="owl-carousel">
                <div class="item">
                    <div class="single-videos">
                        <div class="images">
                            <a href="index.html#"><img src="images/fetuered/1.jpg" alt=""></a>
                            <div class="overley">
                                <div class="videos-icon">
                                    <a class="popup-videos" href="http://www.youtube.com/watch?v=Cdajfy4voyY"><img src="images/fetuered/video-icon.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="videos-text">
                            <h3><a href="index.html#">Smart Packs Parking Sensor Tech</a></h3>
                            <span class="date"> <i class="fa fa-calendar-check-o" aria-hidden="true"></i> November 28, 2017 </span>
                            <span class="comment"><a href="index.html#"><i class="fa fa-comment-o" aria-hidden="true"></i> 50 </a></span>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="single-videos">
                        <div class="images">
                            <a href="index.html#"><img src="images/fetuered/2.jpg" alt=""></a>
                            <div class="overley">
                                <div class="videos-icon">
                                    <a class="popup-videos" href="http://www.youtube.com/watch?v=Cdajfy4voyY"><img src="images/fetuered/video-icon.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="videos-text">
                            <h3><a href="index.html#">Woman Endure Five Year Slvery</a></h3>
                            <span class="date"> <i class="fa fa-calendar-check-o" aria-hidden="true"></i> November 28, 2017 </span><span class="comment"><a href="index.html#"><i class="fa fa-comment-o" aria-hidden="true"></i> 50 </a></span>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="single-videos">
                        <div class="images">
                            <a href="index.html#"><img src="images/fetuered/3.jpg" alt=""></a>
                            <div class="overley">
                                <div class="videos-icon">
                                    <a class="popup-videos" href="http://www.youtube.com/watch?v=Cdajfy4voyY"><img src="images/fetuered/video-icon.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="videos-text">
                            <h3><a href="index.html#">Health Benefits of Morning Running</a></h3>
                            <span class="date"> <i class="fa fa-calendar-check-o" aria-hidden="true"></i> November 28, 2017 </span><span class="comment"><a href="index.html#"><i class="fa fa-comment-o" aria-hidden="true"></i> 50 </a></span>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="single-videos">
                        <div class="images">
                            <a href="index.html#"><img src="images/fetuered/4.jpg" alt=""></a>
                            <div class="overley">
                                <div class="videos-icon">
                                    <a class="popup-videos" href="http://www.youtube.com/watch?v=Cdajfy4voyY"><img src="images/fetuered/video-icon.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="videos-text">
                            <h3><a href="index.html#">Smart Packs Parking Sensor Tech</a></h3>
                            <span class="date"> <i class="fa fa-calendar-check-o" aria-hidden="true"></i> November 28, 2017 </span><span class="comment"><a href="index.html#"><i class="fa fa-comment-o" aria-hidden="true"></i> 50 </a></span>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="single-videos">
                        <div class="images">
                            <a href="index.html#"><img src="images/fetuered/5.jpg" alt=""></a>
                            <div class="overley">
                                <div class="videos-icon">
                                    <a class="popup-videos" href="http://www.youtube.com/watch?v=Cdajfy4voyY"><img src="images/fetuered/video-icon.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="videos-text">
                            <h3><a href="index.html#">Smart Packs Parking Sensor Tech</a></h3>
                            <span class="date"> <i class="fa fa-calendar-check-o" aria-hidden="true"></i> November 28, 2017 </span><span class="comment"><a href="index.html#"><i class="fa fa-comment-o" aria-hidden="true"></i> 50 </a></span>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="single-videos">
                        <div class="images">
                            <a href="index.html#"><img src="images/fetuered/2.jpg" alt=""></a>
                            <div class="overley">
                                <div class="videos-icon">
                                    <a class="popup-videos" href="http://www.youtube.com/watch?v=Cdajfy4voyY"><img src="images/fetuered/video-icon.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="videos-text">
                            <h3><a href="index.html#">Smart Packs Parking Sensor Tech</a></h3>
                            <span class="date"> <i class="fa fa-calendar-check-o" aria-hidden="true"></i> November 28, 2017 </span><span class="comment"><a href="index.html#"><i class="fa fa-comment-o" aria-hidden="true"></i> 50 </a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Fetuered videos End Here -->

    <!-- Hot News Start Here -->
    <div class="hot-news">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            {{--@foreach($statuses as $status)--}}
                                {{--<div id="news-Carousel2" class="carousel carousel-news slide" data-ride="carousel">--}}
                                    {{--<!-- Wrapper for slides -->--}}
                                    {{--<!-- Left and right controls -->--}}
                                    {{--<div class="next-prev-top">--}}
                                        {{--<div class="row">--}}
                                            {{--<div class="col-sm-9 col-xs-9">--}}
                                                {{--<div class="view-area">--}}
                                                    {{--<h3 class="title-bg">{{$status->name}}</h3>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}

                                            {{--<div class="col-sm-3 col-xs-3 next-prev">--}}
                                                {{--<a class="left news-control" href="#news-Carousel2" data-slide="prev">--}}
                                                    {{--<span class="news-arrow-left"><i class="fa fa-angle-left" aria-hidden="true"></i></span>--}}
                                                {{--</a>--}}
                                                {{--<a class="right news-control" href="#news-Carousel2" data-slide="next">--}}
                                                    {{--<span class="news-arrow-right"><i class="fa fa-angle-right" aria-hidden="true"></i></span>--}}
                                                {{--</a>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="carousel-inner">--}}
                                        {{--@foreach($status->posts as $post)--}}
                                            {{--<div class="item active">--}}
                                                {{--<a href="index.html#"><img src="images/news-slider-image/2.jpg" alt="" title="#slider-direction-1" /></a>--}}
                                                {{--<div class="dsc">--}}
                                                {{--<span class="date">--}}
                                                    {{--<i class="fa fa-calendar-check-o" aria-hidden="true"></i>--}}
                                                    {{--November 28, 2017--}}
                                                {{--</span>--}}
                                                    {{--<span class="comment">--}}
                                                    {{--<a href="index.html#"> <i class="fa fa-comment-o" aria-hidden="true"></i> 50--}}
                                                    {{--</a>--}}
                                                {{--</span>--}}
                                                    {{--<h4><a href="blog-single.html">{{$post->title}}</a></h4>--}}
                                                    {{--<p>Blandit rutrum, erat et egestas ultricies, dolor tortor egestas enim, quiste rhoncus sem the purus eu sapien curabitur.</p>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}

                                        {{--@endforeach--}}

                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--@endforeach--}}
                        </div>
                    </div>
                    <!--End Two Slider -->
                    <!--Around Area Start Here -->

                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 paddimg-left-none">
                    <h3 class="title-bg featured-title">Featured News</h3>
                    <div class="sidebar">
                        <ul>
                                @foreach($features  as $feature)
                                    <li>
                                        <a href="index.html#" class="category-btn hvr-bounce-to-right">{{$feature->category->name}}</a>
                                        <div class="post-image"><a href="blog-single.html"><img src="{{asset('posts/'.$feature->images[0]->photo)}}" alt="News image" /></a></div>
                                        <div class="content">
                                            <h4><a href="blog-single.html">{{$feature->title}}</a></h4>
                                            <span class="date">
                                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i> {{date('j M Y', strtotime($trend->created_at))}}
                                    </span>
                                        </div>
                                    </li>


                                @endforeach
                        </ul>
                        <div class="categories-home separator-large3">
                            <h3 class="title-bg">Categories</h3>
                            <ul>
                                <li><a href="category.html"> <i class="fa fa-angle-right" aria-hidden="true"></i> Business <span>45</span></a></li>
                                <li><a href="category-world.html"><i class="fa fa-angle-right" aria-hidden="true"></i> World <span>70</span></a></li>
                                <li><a href="category-fashion.html"><i class="fa fa-angle-right" aria-hidden="true"></i> Fashion <span>45</span></a></li>
                                <li><a href="category-politics.html"><i class="fa fa-angle-right" aria-hidden="true"></i> Politics <span>55</span></a></li>
                                <li><a href="category-sports.html"><i class="fa fa-angle-right" aria-hidden="true"></i> Sports <span>50</span></a></li>
                                <li><a href="category-health.html"><i class="fa fa-angle-right" aria-hidden="true"></i> Health <span>65</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- All News Section end Here -->
    <!-- Footer Area Section Start Here -->
    <div class="add-section separator-large2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <img src="images/footer-top.png" alt="footer">
                </div>
            </div>
        </div>
    </div>
    @endsection