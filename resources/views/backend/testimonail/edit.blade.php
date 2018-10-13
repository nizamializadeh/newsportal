@component('backend.components.form',$settings)
    {{-- Component content--}}
    <form id="form_validation" action="{{route('testimonail.update',['testimonail' => $testimonail->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PUT')}}
        <div class="row clearfix">
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input name="photo" type="file" required class="form-control hidden post-image" id="postImage">
                        <label for="postImage" style="cursor: pointer">
                            <img class="img-responsive thumbnail post-img-preview" src="{{asset('testimonails/'.$testimonail->image)}}">
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input name="name" type="text" required class="form-control" value="{{$testimonail->name}}">
                        <label class="form-label">Name</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input name="company" type="text" required class="form-control" value="{{$testimonail->company}}">
                        <label class="form-label">Company</label>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group form-float">
                    <div class="form-line">
                        <textarea name="message" id="tinymce" aria-hidden="true"> {{$testimonail->message}} </textarea>
                    </div>
                    <label class="form-label">Message</label>

                </div>
            </div>
            <div class="col-sm-12">
                <div class="demo-switch">
                    <button type="submit" class="btn btn-success waves-effect right">Edit testimonail</button>
                </div>
            </div>
        </div>
    </form>
@endcomponent