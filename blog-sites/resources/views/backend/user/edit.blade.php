@extends('backend.dashboard_one')
@section('title','User Edit')
@section('adminContent')
    <div>
        <form method="post">
            {{csrf_field()}}
            <h3 class="text text-center text-info">Edit User Information</h3>
            <div class="form-group">
                <label for="name">Username</label>
                <input type="text" class="form-control" id="name" name="name"  value="{{$user->name}}">
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
            </div>
            <div class="form-group form-check">
                @foreach($roles as $role)
                    <div>
                        <input type="checkbox" value="{{$role->id}}" class="form-check-input" id="role{{$role->id}}" name="roles[]"
                        @foreach($user->roles as $userRole)
                            @if($userRole->name == $role->name)
                                checked
                            @endif
                        @endforeach
                        >
                        <label class="form-check-label" for="role{{$role->id}}">{{$role->name}}</label>
                    </div>
                @endforeach
            </div>
            @foreach($errors->all() as $error)
                <p class="text text-danger">***{{$error}}</p>
            @endforeach
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
