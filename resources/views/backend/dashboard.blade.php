@extends('layouts.backend')

@section('content')
    <div class="container-fluid">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <div class="icon bg-red">
                    <i class="material-icons">face</i>
                </div>
                <div class="content">
                    <div class="text">Authors</div>
                    <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20">{{$author->count()}}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <div class="icon bg-red">
                    <i class="material-icons">local_post_office</i>
                </div>
                <div class="content">
                    <div class="text">Post</div>
                    <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20">{{$post->count()}}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <div class="icon bg-red">
                    <i class="material-icons">tag_faces</i>
                </div>
                <div class="content">
                    <div class="text">Tag</div>
                    <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20">{{$tag->count()}}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <div class="icon bg-red">
                    <i class="material-icons">tune</i>
                </div>
                <div class="content">
                    <div class="text">Category</div>
                    <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20">{{$category->count()}}</div>
                </div>
            </div>
        </div>


    </div>
@endsection