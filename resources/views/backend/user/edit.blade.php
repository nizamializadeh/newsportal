@extends('layouts.backend')

@section('content')
        <div class="container-fluid">

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Edit Profile
                            </h2>

                        </div>
                        <div class="body">
                            <form action=" {{route('profil.update'}}"   method="post" enctype="multipart/form-data" >
                                {{ method_field('PUT') }}
                                @csrfp
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="name" id="name" class="form-control" value="{{Auth::user()->name}}">
                                        <label class="form-label">name</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="surname" id="surname" class="form-control" value="{{Auth::user()->surname}}">
                                        <label class="form-label">surname</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="email" id="link" class="form-control" value="{{Auth::user()->email}}">
                                        <label class="form-label">email</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="file" name="file" id="file" class="form-control">
                                        <label class="form-label">image</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                        <img style="width: 200px;" class="img-responsive" src="{{ asset('/images/'.Auth::user()->image) }}">
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="password" id="link" class="form-control">
                                        <label class="form-label">password</label>
                                    </div>
                                </div>
                                <br>
                                <div class="row clearfix demo-button-sizes">
                                    <div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>

@endsection
