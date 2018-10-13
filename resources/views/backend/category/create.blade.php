@component('backend.components.form',$setting)
    {{-- Component content--}}
    <form id="form_validation" action="{{route('category.store')}}" method="post">
        @csrf
        <div class="row clearfix">
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input name="name" type="text" required class="form-control">
                        <label class="form-label">Name</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="input-group hidden colorpicker colorpicker-element">
                    <div class="form-line">
                        <input type="text" class="form-control " name="color" value="#00AABB">
                    </div>
                    <span class="input-group-addon">
                        <i style="background-color: rgb(134, 186, 191);"></i>
                    </span>
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