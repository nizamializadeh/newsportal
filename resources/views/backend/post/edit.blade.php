@component('backend.components.form',$settings)
    {{-- Component content--}}
    <form id="form_validation" action="{{route('post.update',['post' => $post->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PUT')}}
        <div class="row clearfix">
            @foreach($post->images as $image)
                <div class="col-sm-6">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label for="postImage" style="cursor: pointer">
                                <img class="img-responsive thumbnail post-img-preview" src="{{asset('posts/'.$image->photo)}}">
                                <input name="photo[]" type="file" required class="form-control  " id="postImage" multiple>

                            </label>
                        </div>
                    </div>
                </div>

            @endforeach

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
                        <input name="que" type="text" required class="form-control" value="{{$post->que}}">
                        <label class="form-label">Number</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="input-group ">
                    <div class="form-line">
                        <select name="author_id" class=" show-tick" data-live-search="true">
                            @foreach($users as $user)
                                <option {{($post->user->id == $user->id) ? "checked" : ""}} value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
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