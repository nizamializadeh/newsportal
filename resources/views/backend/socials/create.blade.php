@component('backend.components.form',$setting)
    {{-- Component content--}}
    <form id="form_validation" action="{{route('social.store')}}" method="post">
        @csrf
        <div class="row clearfix">
            <div class="col-sm-12">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input name="link" type="text" required class="form-control">
                        <label class="form-label">link</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input name="icon" type="text" required class="form-control">
                        <label class="form-label">icon</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                    <button type="submit" class="btn btn-success waves-effect right">Create social</button>
                </div>
            </div>
        </div>
    </form>
@endcomponent