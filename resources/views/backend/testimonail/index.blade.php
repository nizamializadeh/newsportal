@component('backend.components.table',$settings)
    {{-- Component content--}}
    @foreach($testimonails as $testimonail)
        <tr>
            <td>{{$testimonail->id}}</td>
            <td>
                <img src="{{asset('testimonails/'.$testimonail->image)}}" alt="" width="150">
            </td>
            <td>{{$testimonail->name}}</td>
            <td>{{$testimonail->company}}</td>
            <td>{{$testimonail->message}}</td>
            <td>
                <form action="{{route('testimonail.destroy',['testimonail' => $testimonail->id])}}" method="post">
                    {{ method_field('delete') }}
                    @csrf
                    <a class="btn bg-blue btn-circle waves-effect waves-circle waves-float" href="{{route('testimonail.edit',['testimonail' => $testimonail->id])}}"><i class="material-icons">edit</i></a>
                    <button type="submit" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
                        <i class="material-icons">delete</i>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
@endcomponent