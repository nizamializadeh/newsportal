@component('backend.components.table',$settings)
    {{-- Component content--}}
    @foreach($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            {{--<td>--}}
                {{--<img src="{{asset('posts/'.$post->images->photo)}}" alt="" width="150">--}}
            {{--</td>--}}
            <td>{{$post->user->name}}</td>
            <td>{{$post->count}}</td>
            <td>
                <div class="switch">
                    <label><input class="statusCheckBox" type="checkbox" {{($post->status) ? 'checked' : ""}}><span class="lever"></span></label>
                </div>
            </td>
            <td>
                <form action="{{route('post.destroy',['post' => $post->id])}}" method="post">
                    {{ method_field('delete') }}
                    @csrf
                    <a class="btn bg-blue btn-circle waves-effect waves-circle waves-float" href="{{route('post.edit',['post' => $post->id])}}"><i class="material-icons">edit</i></a>
                    <button type="submit" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
                        <i class="material-icons">delete</i>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
@endcomponent