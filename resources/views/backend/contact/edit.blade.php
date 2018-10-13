@component('backend.components.form',$setting)
    {{-- Component content--}}
    <form id="form_validation" action="{{route('contact.update',['contact' => $contact->id])}}" method="post">
        {{method_field('PUT')}}
        @csrf
        <div class="row clearfix">
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input name="text" type="text" required class="form-control" value="{{$contact->text}}">
                    </div>
                    <label class="form-label">Name</label>

                </div>
            </div>
            <div class="col-sm-6">
                <div class="input-group ">
                    <div class="form-line">
                        <input type="text" class="form-control" name="adress" value="{{$contact->adress}}">
                    </div>
                    <label class="form-label">Adress</label>

                </div>
            </div>
            <div class="col-sm-6">
                <div class="input-group ">
                    <div class="form-line">
                        <input type="text" class="form-control" name="phone" value="{{$contact->phone}}">
                    </div>
                    <label class="form-label">Phone</label>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="input-group ">
                    <div class="form-line">
                        <input type="text" class="form-control" name="email" value="{{$contact->email}}">
                    </div>
                    <label class="form-label">Email</label>

                </div>
            </div>
            <div class="col-sm-6">
                <div class="input-group ">
                    <div class="form-line">
                        <input type="text" class="form-control" name="map" value="{{$contact->map}}">
                    </div>
                    <label class="form-label">Map</label>

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