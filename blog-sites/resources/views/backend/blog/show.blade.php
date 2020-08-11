@extends('backend.admindashboard')
@section('adminContent')
    <a href="{{asset('admin/blogs')}}">Back</a>
    <div class="mb-3 p-3">
        <h5 class="card-title">{{$blog->title}}</h5>
        <h6 class="text text-success">{{$blog->created_at->format('d/m/Y')}}</h6>
        @if($blog->image != null)
            <img height="250px" src="{{asset('/uploads/'.$blog->image)}}" class="card-img col-md-8" alt="...">
        @endif
        <div class="card-body">
            <p class="card-text">{!! $blog->content !!}</p>
        </div>
        @if($blog->video != null)
        <div class="em-context mt-2 mb-4">
            {!! $blog->video !!}
        </div>
        @endif

        <a target="_blank" href="https://web.facebook.com/myanmarlabournews" class="btn btn-block btn-outline-info">Go to Facebook Page</a>
    </div>
@endsection
