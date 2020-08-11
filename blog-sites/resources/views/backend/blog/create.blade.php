@extends('backend.admindashboard')
@section('adminContent')
    <div class="container">
        <h3 class="text text-center text-info">Add New Blog</h3>
        @if(session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('status')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <form method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="title">Blog Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
            </div>
            <div class="form-group">
                <label for="title">Image</label>
                <input type="file" class="form-control-file" id="file" name="file" value="{{old('file')}}">
            </div>
            <div class="form-group">
                <label for="video">Video URL <span class="text text-primary">(Optional)</span></label>
                <input type="text" class="form-control" id="video" name="video">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea id="content" name="content" class="form-control">{{old('content')}}</textarea>
            </div>
            <div class="form-group">
                <label for="blogtype">Choose the type of blog (csategory tag)</label>
                <select class="form-control" name="blogtype" id="blogtype">
                    <option value="none">None</option>
                    <option value="feature">Feature</option>
                    <option value="publication">Publication</option>
                    <option value="election">Election</option>
                </select>
            </div>
            @foreach($errors->all() as $error)
                <p class="text-danger">{{$error}}</p>
            @endforeach
            <div class="float-right">
                <button type="reset" class="btn btn-outline-danger">Reset</button>
                <button type="submit" class="btn btn-success">Create</button>
            </div>
        </form>
    </div>
@endsection

