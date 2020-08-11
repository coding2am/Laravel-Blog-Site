@extends('layouts.master')
@section('title','Home')
@section('content')
    <div class="container">
        <div class="col-md-12 col-sm-12">
            <h1 class="text text-center text-dark">
                <marquee>Myanmar Labour News Media</marquee>
            </h1>
            {{$blogs->links()}}
            <div class="row">
                @foreach($blogs as $blog)
                    <div class="card border-info col-md-4 col-sm-12 offset-sm-0 mb-4 rounded-0 p-3">
                        <p class="card-title" style="height: 110px">{{$blog->title}}</p>
                        @if($blog->image != null)
                        <img src="{{asset('uploads/'.$blog->image)}}" class="card-img-top" height="200px">
                        @else
                        <div class="em-context">
                            {!! $blog->video !!}
                        </div>
                        @endif
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Uploaded in <span class="text text-info">{{$blog->created_at->diffForHumans()}}</span></li>
                            <li class="list-group-item">Date- <span class="text text-info">{{$blog->created_at->format('d-M-Y')}}</span></li>
                        </ul>
                        <a href="{{asset('blog/detail/'.$blog->id)}}" class="btn btn-block btn-info">See More</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
