@component('backend.components.form',$settings)
    {{-- Component content--}}
    <form id="form_validation" action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row clearfix">

            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input name="photo[]" type="file" required class="form-control  post-image" id="postImage" multiple>

                        {{--<label for="postImage" style="cursor: pointer">--}}
                            {{--<img class="img-responsive thumbnail post-img-preview" src="{{asset('admin/images/image-gallery/thumb/thumb-15.jpg')}}">--}}
                        {{--</label>--}}
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input name="title" type="text" required class="form-control">
                        <label class="form-label">Title</label>
                    </div>
                </div>
            </div><div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input name="time" type="text" required class="form-control">
                        <label class="form-label">time</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input name="video" type="text" required class="form-control">
                        <label class="form-label">Video</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input name="keyword" type="text" required class="form-control">
                        <label class="form-label">Keyword</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input name="que" type="text" required class="form-control">
                        <label class="form-label">Number</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="input-group ">
                    <div class="form-line">
                        <select name="category_id" class=" bootstrap-select show-tick" data-live-search="true">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="input-group">
                    <div class="form-line">
                        <select name="tags[]" class=" show-tick" multiple data-selected-text-format="count">
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="input-group">
                    <div class="form-line">
                        <select name="type" class=" show-tick">
                            <option value="0">Normal</option>
                            <option value="1"> Editor picks</option>
                            <option value="2">Recommended</option>
                        </select>
                    </div>
                </div>
            </div>


            <div class="col-sm-12">
                <div class="form-group form-float">
                    <div class="form-line">
                        <textarea name="text" id="tinymce" aria-hidden="true"> </textarea>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <h2 class="card-inside-title">Status</h2>
                <div class="demo-switch">
                    <div class="switch">
                        <label>Deactive<input type="checkbox" name="status" checked="1"><span class="lever"></span>Active</label>
                    </div>
                    <button type="submit" class="btn btn-success waves-effect right">Create category</button>
                </div>
            </div>
        </div>
    </form>
@endcomponent