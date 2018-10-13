@component('backend.components.table',$settings)
    {{-- Component content--}}
    @foreach($abouts as $about)
        <tr>
            <td>{{$about->id}}</td>
            <td>{{$about->title}}</td>
            <td>
                <img src="{{asset('about/'.$about->image)}}" alt="" width="150">
            </td>
            <td>{{$about->text}}</td>
            <td>
                <form action="{{route('abouts.destroy',['about' => $about->id])}}" method="post">
                    {{ method_field('delete') }}
                    @csrf
                    <a class="btn bg-blue btn-circle waves-effect waves-circle waves-float" href="{{route('abouts.edit',['about' => $about->id])}}"><i class="material-icons">edit</i></a>
                    <button type="submit" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
                        <i class="material-icons">delete</i>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
@endcomponent