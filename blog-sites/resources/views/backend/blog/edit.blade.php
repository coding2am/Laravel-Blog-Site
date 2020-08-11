@extends('backend.admindashboard')
@section('adminContent')
    <div class="container">
        <h3 class="text text-center text-info">Edit Blog</h3>
        @if(session('status'))
            <p class="text text-success">{{session('status')}}</p>
        @endif
        <form method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="title">Blog Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$blog->title}}">
            </div>
            <div class="form-group">
                <label for="title">Image</label>
                <input type="file" class="form-control-file" id="file" name="file">
            </div>
            <input type="hidden" value="{{$blog->image}}" name="old_file">

            <div class="form-group">
                <label for="video">Video URL <span class="text text-primary">(Optional)</span></label>
                <input type="text" class="form-control" id="video" name="video" value="{{$blog->video}}">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea id="content" name="content" class="form-control">{{$blog->content}}"</textarea>
            </div>
            <div class="form-group">
                <label for="blogtype">Choose the type of blog (category tag)</label>
                <select name="blogtype" id="blogtype" class="form-control">
                    <option value="none"
                        @if($blog->blog_type == 'none')
                            selected
                            @endif
                    >None</option>
                    <option value="feature"
                    @if($blog->blog_type == 'feature')
                    selected
                    @endif>Feature</option>
                    <option value="publication"
                        @if($blog->blog_type == 'publication')
                    selected
                        @endif>Publication</option>
                    <option value="election"
                    @if($blog->blog_type == 'election')
                        selected
                    @endif>Election</option>
                </select>
            </div>
            @foreach($errors->all() as $error)
                <p class="text-danger">{{$error}}</p>
            @endforeach
            <div class="float-right">
                <button type="reset" class="btn btn-outline-danger">Reset</button>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
@endsection

