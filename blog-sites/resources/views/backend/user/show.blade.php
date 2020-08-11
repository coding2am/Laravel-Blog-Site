@extends('backend.dashboard_one')
@section('title','User Detail')
@section('adminContent')
    <div class="card p-4">
        <h3 class="text-center text text-info">User Detail</h3>
        <div class="card-body">
            <h5 class="card-title">Username - {{$user->name}}</h5>
            <h5 class="card-title">E-mail - {{$user->email   }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Created at: {{$user->created_at->format('m/d/Y')}}</h6>
            <p class="card-text">
                Responsible Roles:
                @foreach($user->roles as $role)
                    <span style="font-size: 13px;" class="badge badge-info">{{$role->name}}</span>
                @endforeach
            </p>
            <a href="{{asset('admin/users')}}" class="card-link">Go back</a>
        </div>
    </div>
@endsection
