@component('backend.components.form',$setting)
    {{-- Component content--}}
    <form id="form_validation" action="{{route('tag.store')}}" method="post">
        @csrf
        <div class="row clearfix">
            <div class="col-sm-12">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input name="name" type="text" required class="form-control">
                        <label class="form-label">name</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="demo-switch">
                    <button type="submit" class="btn btn-success waves-effect right">Create tag</button>
                </div>
            </div>
        </div>
    </form>
@endcomponent