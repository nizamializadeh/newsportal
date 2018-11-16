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
            <div class="col-sm-3">
                <div class="input-group">
                    <div class="form-line">
                        <select name="parent_id" class=" show-tick"  data-selected-text-format="count">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        <label class="last">category</label>

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
                <div class="demo-switch">
                    <button type="submit" class="btn btn-success waves-effect right">Create category</button>
                </div>
            </div>
        </div>
    </form>
@endcomponent