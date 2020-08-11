@extends('backend.admindashboard')
@section('adminContent')
    <div class="container">
        <h1 class="text text-center text-info">Blog Control</h1>
        @if(session('status'))
            <p class="text text-success">{{session('status')}}</p>
        @endif
        <a style="font-size: 25px; text-decoration: none;" href="{{asset('admin/blog/create')}}" class="fas fa-plus-square float-right mb-2"></a>
        <table class="table-bordered table text-center">
            <thead>
            <tr>
                <th>ADD IN</th>
                <th>CONTENT TITLE</th>
                <th>DATE</th>
                <th>SETTING</th>
            </tr>
            </thead>
            <tbody>
            @foreach($blogs as $blog)
                <tr>
                    <td class="text-success">{{$blog->created_at->diffForHumans()}}</td>
                    <td><a href="{{asset('admin/blog/show/'.$blog->id)}}">{{$blog->title}}</a></td>
                    <td>{{$blog->created_at->format('d-M-Y')}}</td>
                    <td colspan="2">
                        <a href="{{asset('admin/blog/edit/'.$blog->id)}}"><i class="fas fa-edit text-primary cursor"></i></a>&nbsp
                        <a onClick="return confirm('Are you sure?')" href="{{asset('admin/blog/delete/'.$blog->id)}}"><i class="fas fa-trash-alt text-danger cursor"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
