@component('backend.components.form',$setting)
    {{-- Component content--}}
    <form id="form_validation" action="{{route('category.update',['category' => $categories->id])}}" method="post">
        {{method_field('PUT')}}
        @csrf
        <div class="row clearfix">
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input name="name" type="text" required class="form-control" value="{{$categories->name}}">
                        <label class="form-label">Name</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="input-group  hidden colorpicker colorpicker-element">
                    <div class="form-line">
                        <input type="text" class="form-control" name="color" value="rgb(134, 186, 191)">
                    </div>
                    <span class="input-group-addon">
                            <i style="background-color: rgb(134, 186, 191);"></i>
                        </span>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="demo-switch">
                    <div class="switch hide">
                        <label>Deactive<input type="checkbox" name="status" {{($categories->status) ? 'checked' : ''}}><span class="lever"></span>Active</label>
                    </div>
                    <button type="submit" class="btn btn-success waves-effect right">Edit category</button>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="input-group ">
                    <div class="form-line">
                        <select name="parent_id" class=" show-tick" data-live-search="true">
                            @foreach($categories as $category)
                                {{$category->name}}
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

        </div>
    </form>
@endcomponent