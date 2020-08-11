@extends('layouts.master')
@section('title','Admin Dashboard')
@section('content')
    <div class="container col-md-10 offset-md-1">
        <div class="card col-sm-12 offset-sm-0 p-3 mt-1">
            <h1 class="text text-center text-info">Admin Control Panel</h1>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-12 mt-3">
                <ul class="list-group">
                    <li class="list-group-item"><a href="{{asset('admin/users')}}">User Control</a></li>
                    <li class="list-group-item"><a href="{{asset('admin/roles')}}">Role Control</a></li>
                    <li class="list-group-item"><a href="{{asset('admin/blogs')}}">Blog Control</a></li>
                </ul>
            </div>
            <div class="col-md-9 col-sm-12 mt-3 card bg-light p-3">
                @yield('adminContent')
            </div>
        </div>
    </div>
@endsection
