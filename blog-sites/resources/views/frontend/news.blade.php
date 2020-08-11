@extends('layouts.master')
@section('title','Home')
@section('content')
    <div class="container">
        <div class="col-md-12 col-sm-12">
            <h1 class="text text-center text-dark">
                <marquee>Myanamar Labour News Media</marquee>
            </h1>
            {{$blogs->links()}}
           @foreach($blogs as $blog)
                <div class="card p-4 mt-2 border-info">
                    <div class="row">
                        <div class="card border-0 col-md-3 col-sm-12">
                            @if($blog->image != null)
                                <img src="{{asset('uploads/'.$blog->image)}}" class="card-img-top" height="200px">
                            @else
                                <div class="em-context">
                                    {!! $blog->video !!}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-9 col-sm-12 mt-2">
                            <h5 class="text-primary">{{$blog->created_at->format('D-M-Y')}}</h5>
                            <h6 class="text-info">{{$blog->created_at->diffForHumans()}}</h6>
                            <p class="text-dark">{{$blog->title}}</p>
                            <a href="{{asset('blog/detail/'.$blog->id)}}" class="btn btn-block btn-outline-primary">See more</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
