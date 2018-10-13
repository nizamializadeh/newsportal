@component('backend.components.table',$settings)
    {{-- Component content--}}
    @foreach($socials as $social)
        <tr>
            <td>{{$social->id}}</td>
            <td>{{$social->link}}</td>
            <td>{{$social->icon}}</td>
            <td>
                <form action="{{route('social.destroy',['social' => $social->id])}}" method="post">
                    {{ method_field('delete') }}
                    @csrf
                    <a class="btn bg-blue btn-circle waves-effect waves-circle waves-float" href="{{route('social.edit',['social' => $social->id])}}"><i class="material-icons">edit</i></a>
                    <button type="submit" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
                        <i class="material-icons">delete</i>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
@endcomponent