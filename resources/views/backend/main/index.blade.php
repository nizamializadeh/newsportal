@component('backend.components.table',$settings)
    {{-- Component content--}}
    @foreach($mains as $main)
        <tr>
            <td>{{$main->id}}</td>
            <td>
                <img src="{{asset('mains/'.$main->logo)}}" alt="" width="150">
            </td>
            <td>
                <img src="{{asset('mains/'.$main->site_share_img)}}" alt="" width="150">
            </td>
            <td>
                <img src="{{asset('mains/'.$main->singe_page_img)}}" alt="" width="150">
            </td>
            <td>{{$main->site_title}}</td>
            <td>{{$main->site_desc}}</td>
            <td>
                <form action="{{route('main.destroy',['main' => $main->id])}}" method="post">
                    {{ method_field('delete') }}
                    @csrf
                    <a class="btn bg-blue btn-circle waves-effect waves-circle waves-float" href="{{route('main.edit',['main' => $main->id])}}"><i class="material-icons">edit</i></a>
                    <button type="submit" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
                        <i class="material-icons">delete</i>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
@endcomponent