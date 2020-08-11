@extends('backend.admindashboard')
@section('adminContent')
    <div class="container">
        <h3 class="text text-center text-info">Edit Role</h3>
        <form method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="exampleInputEmail1">Role Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{$role->name    }}">
            </div>
            @foreach($errors->all() as $error)
                <p class="text-danger">{{$error}}</p>
            @endforeach
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

