@extends('backend.dashboard_one')
@section('title','User List')
@section('adminContent')
    <h3 class="text-center text text-info">User Control</h3>
    @if(session('status'))
        <p class="text text-success">{{session('status')}}</p>
    @endif
    <table class="table text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>USERNAME</th>
                <th>ROLES</th>
                <th>SETTING</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>
                        <a href="{{asset('admin/user/show/'.$user->id)}}">{{$user->name}}</a>
                    </td>
                    <td>
                        @foreach($user->roles as $role)
                            <span style="font-size: 12px;" class="badge badge-info">{{$role->name}}</span>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{asset('admin/user/edit/'.$user->id)}}"><i class="fas fa-edit text-primary cursor"></i></a>&nbsp&nbsp&nbsp
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
