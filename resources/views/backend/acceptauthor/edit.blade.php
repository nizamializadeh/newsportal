@component('backend.components.form',$settings)
    {{-- Component content--}}
    <form id="form_validation" action="{{route('acceptauthor.update',['acceptauthor' => $user->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PUT')}}
        <div class="row clearfix">
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input name="name" type="text" required class="form-control" value="{{$user->name}}">
                        <label class="form-label">Name</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input name="email" type="text" required class="form-control" value="{{$user->email}}">
                        <label class="form-label">Email</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group form-float">
                    <div class="form-line">
                        <select name="accept" class=" show-tick" data-selected-text-format="count">
                            <option {{($user->accept ==1) ? "selected" : ""}} value="1">  Author Aktive</option>
                            <option {{($user->accept ==0) ? "selected" : ""}} value="0">DeAktive</option>

                        </select>
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