@component('backend.components.form',$settings)
    {{-- Component content--}}
    <form id="form_validation" action="{{route('abouts.update',['about' => $about->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PUT')}}
        <div class="row clearfix">
            <div class="col-sm-12">
                <div class="form-group form-float">
                    <div class="form-line">
                        <textarea name="text" id="tinymce" aria-hidden="true"> {{$about->text}} </textarea>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="demo-switch">
                    <button type="submit" class="btn btn-success waves-effect right">Edit about</button>
                </div>
            </div>
        </div>
    </form>
@endcomponent