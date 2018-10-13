@component('backend.components.form',$setting)
    {{-- Component content--}}
    <form id="form_validation" action="{{route('main.update',['main' => $main->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PUT')}}
        <div class="row clearfix">
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input name="photo" type="file" required class="form-control  post-image" id="postImage">
                        {{--<label for="postImage" style="cursor: pointer">--}}
                            {{--<img class="img-responsive thumbnail post-img-preview" src="{{asset('mains/'.$main->logo)}}">--}}
                        {{--</label>--}}
                    </div>
                    <label class="form-label">Logo</label>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input name="share_img" type="file" required class="form-control  post-imageshare" id="postImageshare">
                        {{--<label for="postImageshare" style="cursor: pointer">--}}
                            {{--<img class="img-responsive thumbnail post-img-preview" src="{{asset('mains/'.$main->site_share_img)}}">--}}
                        {{--</label>--}}
                    </div>
                    <label class="form-label">SiteImage </label>

                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input name="page_img" type="file" required class="form-control  post-imagepage" id="postImagepage">
                        {{--<label for="postImagepage" style="cursor: pointer">--}}
                            {{--<img class="img-responsive thumbnail post-img-preview" src="{{asset('mains/'.$main->singe_page_img)}}">--}}
                        {{--</label>--}}
                    </div>
                    <label class="form-label">SinglePageImage</label>
                </div>
            </div>
            {{--<div class="col-sm-6">--}}
                {{--<div class="form-group form-float">--}}
                    {{--<div class="form-line">--}}
                        {{--<input name="singe_page_img" type="text" required class="form-control" value="{{$main->singe_page_img}}">--}}
                        {{--<label class="form-label">Title</label>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input name="site_title" type="text" required class="form-control" value="{{$main->site_title}}">
                        <label class="form-label">Title</label>
                    </div>
                </div>
            </div>
            {{--<div class="col-sm-6">--}}
                {{--<div class="form-group form-float">--}}
                    {{--<div class="form-line">--}}
                        {{--<input name="site_share_img" type="text" required class="form-control" value="{{$main->site_share_img}}">--}}
                        {{--<label class="form-label">Title</label>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="col-sm-12">
                <div class="form-group form-float">

                    <div class="form-line">
                        <textarea name="site_desc" id="tinymce" aria-hidden="true"> {{$main->site_desc}} </textarea>

                    </div>
                    <label class="form-label">Description</label>

                </div>
            </div>
            <div class="col-sm-12">
                <div class="demo-switch">
                    <button type="submit" class="btn btn-success waves-effect right">Edit main</button>
                </div>
            </div>
        </div>
    </form>
@endcomponent