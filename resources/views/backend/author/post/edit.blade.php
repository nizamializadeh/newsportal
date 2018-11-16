@component('backend.components.form',$settings)
    {{-- Component content--}}
    @foreach($authorpost->images as $image)

        <div class="col-sm-6">
            <div class="form-group form-float">
                    <div class="col-sm-6">
                    <img  style="max-height:250px" class="img-responsive thumbnail post-img-preview" src="{{asset('posts/'.$image->photo)}}">
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

                        <form action="{{route('image.destroy',['image' => $image->id])}}" method="post">
                            {{ method_field('delete') }}
                            @csrf
                            <button type="submit" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">delete</i>
                            </button>
                        </form>
                </div>
            </div>
        </div>
    @endforeach
    <form id="form_validation" action="{{route('authorpost.update',['authorpost' => $authorpost->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PUT')}}
        <div class="row clearfix">

            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input name="photo[]" type="file"  class="form-control  post-image" id="postImage" multiple>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input name="title" type="text" required class="form-control" value="{{$authorpost->title}}">
                        <label class="form-label">Title</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input name="video" type="text" required class="form-control" value="{{$authorpost->video}}">
                        <label class="form-label">Video</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input name="keyword" type="text" required class="form-control" value="{{$authorpost->keyword}}">
                        <label class="form-label">Keyword</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <select name="que" class=" show-tick" data-selected-text-format="count">

                                <option {{($authorpost->que ==1) ? "selected" : ""}} value="1"> de Aktive</option>
                                <option {{($authorpost->que ==0) ? "selected" : ""}} value="0">  Aktive</option>

                        </select>

                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="input-group ">
                    <div class="form-line">
                        <select name="category_id" class=" show-tick" data-live-search="true">
                            @foreach($categories as $category)
                                <option {{($authorpost->category_id == $authorpost->id) ? "selected" : ""}} value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="input-group">
                    <div class="form-line">
                        <select name="tags[]" class=" show-tick" multiple="" data-selected-text-format="count">
                            @foreach($tags as $tag)
                                <option {{ in_array($tag->id, $authorpost->tags->pluck('id')->toArray()) ? 'selected' : ''}} value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group form-float">
                    <div class="form-line">
                        <textarea name="text" id="tinymce" aria-hidden="true"> {{$authorpost->text}} </textarea>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="demo-switch">
                    <div class="switch hide">
                        <label><input class="statusCheckBox" data-row="{{$authorpost->id}}" type="checkbox" {{($authorpost->status) ? 'checked' : ""}}><span class="lever"></span></label>
                    </div>
                    <button type="submit" class="btn btn-success waves-effect right">Edit post</button>
                </div>
            </div>
        </div>
    </form>
@endcomponent