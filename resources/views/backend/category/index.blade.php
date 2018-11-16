@component('backend.components.table',$settings)
    {{-- Component content--}}
    @foreach($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>
                <div class="switch">
                    <label><input class="statusCheckBox" data-row="{{$category->id}}" type="checkbox" {{($category->status) ? 'checked' : ""}}><span class="lever"></span></label>
                </div>
            </td>
            <td>
                <form action="{{route('category.destroy',['category' => $category->id])}}" method="post">
                    {{ method_field('delete') }}
                    @csrf
                    <a class="btn bg-blue btn-circle waves-effect waves-circle waves-float" href="{{route('category.edit',['category' => $category->id])}}"><i class="material-icons">edit</i></a>
                    <button type="submit" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
                        <i class="material-icons">delete</i>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
@endcomponent