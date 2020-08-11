@extends('backend.admindashboard')
@section('adminContent')
    <div class="container">
        <div class="bg-light p-2">
            <h3 class="text-center text text-info">Role Control</h3>
            @if(session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('status')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
                <a style="font-size: 25px; text-decoration: none;" href="{{asset('admin/role/create')}}" class="fas fa-plus-square float-right mb-2"></a>
            <table class="table text-center">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>ROLENAME</th>
                    <th>CREATED AT</th>
                    <th>SETTING</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td class="text-success">{{$role->created_at->diffForHumans()}}</td>
                        <td colspan="2">
                            <a href="{{asset('admin/role/edit/'.$role->id)}}"><i class="fas fa-edit text-primary cursor"></i></a>&nbsp&nbsp&nbsp
                            <a onClick="return confirm('Are you sure?')" href="{{asset('admin/role/delete/'.$role->id)}}"><i class="fas fa-trash-alt text-danger cursor"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

