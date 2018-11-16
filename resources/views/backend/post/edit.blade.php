@component('backend.components.form',$settings)
    {{-- Component content--}}
    @foreach($post->images as $image)

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
    <form id="form_validation" action="{{route('post.update',['post' => $post->id])}}" method="post" enctype="multipart/form-data">
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
                        <input name="title" type="text" required class="form-control" value="{{$post->title}}">
                        <label class="form-label">Title</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input name="video" type="text" required class="form-control" value="{{$post->video}}">
                        <label class="form-label">Video</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input name="keyword" type="text" required class="form-control" value="{{$post->keyword}}">
                        <label class="form-label">Keyword</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <select name="trend" class=" show-tick" data-selected-text-format="count">

                                <option {{($post->trend ==1) ? "selected" : ""}} value="1"> de Aktive</option>
                                <option {{($post->trend ==0) ? "selected" : ""}} value="0">  Aktive</option>
                        </select>
                    </div>
                    <label class="form-label">Trend</label>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <select name="head" class=" show-tick" data-selected-text-format="count">

                                <option {{($post->head ==1) ? "selected" : ""}} value="1"> de Aktive</option>
                                <option {{($post->head ==0) ? "selected" : ""}} value="0">  Aktive</option>
                        </select>
                    </div>
                    <label class="form-label">Head</label>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <select name="break" class=" show-tick" data-selected-text-format="count">

                                <option {{($post->break ==1) ? "selected" : ""}} value="1"> de Aktive</option>
                                <option {{($post->break ==0) ? "selected" : ""}} value="0">  Aktive</option>
                        </select>
                    </div>
                    <label class="form-label">Break</label>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <select name="feature" class=" show-tick" data-selected-text-format="count">

                                <option {{($post->feature ==1) ? "selected" : ""}} value="1"> de Aktive</option>
                                <option {{($post->feature ==0) ? "selected" : ""}} value="0">  Aktive</option>
                        </select>
                    </div>
                    <label class="form-label">Feature</label>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="input-group ">
                    <div class="form-line">
                        <select name="category_id" class=" show-tick" data-live-search="true">
                            @foreach($categories as $category)
                                <option {{($post->category_id == $category->id) ? "selected" : ""}} value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label class="form-label">Category</label>

                </div>
            </div>
            <div class="col-sm-3">
                <div class="input-group">
                    <div class="form-line">
                        <select name="tags[]" class=" show-tick" multiple="" data-selected-text-format="count">
                            @foreach($tags as $tag)
                                <option {{ in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : ''}} value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label class="form-label">Tag</label>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group form-float">
                    <div class="form-line">
                        <textarea name="text" id="tinymce" aria-hidden="true"> {{$post->text}} </textarea>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="demo-switch">
                    <div class="switch hide">
                        <label><input class="statusCheckBox" data-row="{{$post->id}}" type="checkbox" {{($post->status) ? 'checked' : ""}}><span class="lever"></span></label>
                    </div>
                    <button type="submit" class="btn btn-success waves-effect right">Edit post</button>
                </div>
            </div>
        </div>
    </form>
@endcomponent