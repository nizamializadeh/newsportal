@component('backend.components.table',$settings)
    {{-- Component content--}}
    @foreach($tags as $tag)
        <tr>
            <td>{{$tag->id}}</td>
            <td>{{$tag->name}}</td>
            <td>
                <form action="{{route('tag.destroy',['tag' => $tag->id])}}" method="post">
                    {{ method_field('delete') }}
                    @csrf
                    <a class="btn bg-blue btn-circle waves-effect waves-circle waves-float" href="{{route('tag.edit',['tag' => $tag->id])}}"><i class="material-icons">edit</i></a>
                    <button type="submit" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
                        <i class="material-icons">delete</i>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
@endcomponent