@component('backend.components.table',$settings)
    {{-- Component content--}}
    @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            @if($user->accept==1)
            <td>Author</td>

           @else
            <td>don't Author </td>

        @endif


            <td>
                <form action="{{route('acceptauthor.destroy',['acceptauthor' =>$user->id])}}" method="post">
                    {{ method_field('delete') }}
                    @csrf
                    <a class="btn bg-blue btn-circle waves-effect waves-circle waves-float" href="{{route('acceptauthor.edit',['acceptauthor' => $user->id])}}"><i class="material-icons">edit</i></a>
                    <button type="submit" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
                        <i class="material-icons">delete</i>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
@endcomponent