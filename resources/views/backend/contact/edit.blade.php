@component('backend.components.form',$setting)
    {{-- Component content--}}
    <form id="form_validation" action="{{route('contact.update',['contact' => $contact->id])}}" method="post">
        {{method_field('PUT')}}
        @csrf
        <div class="row clearfix">
            <div class="col-sm-6">
                <div class="input-group ">
                    <div class="form-line">
                        <input type="email" class="form-control" name="email" value="{{$contact->email}}">
                    </div>
                    <label class="form-label">Email</label>

                </div>
            </div>
            <div class="col-sm-12">
                <div class="demo-switch">
                    <button type="submit" class="btn btn-success waves-effect right">Edit contact</button>
                </div>
            </div>
        </div>
    </form>
@endcomponent