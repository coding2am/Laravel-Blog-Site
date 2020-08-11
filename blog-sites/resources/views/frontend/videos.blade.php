@extends('layouts.master')
@section('title','Home')
@section('content')
    <div class="container">
        <div class="col-md-12 col-sm-12">
            <h1 class="text text-center text-dark">
                <marquee>Myanamar Labour News Media</marquee>
            </h1>
            <div class="row">
                @foreach($blogs as $blog)
                    @if($blog->video != null)
                        <div class="col-md-4 p-3 table-bordered border-info rounded-sm mt-2">
                            <div style="height: 100px;" class="text-info">{{$blog->title}}</div>
                            <div class="em-wapper mb-3">
                                <div class="em-context">
                                    {!! $blog->video !!}
                                </div>
                            </div>
                            <div class="text-primary">{{$blog->created_at->diffForHumans()}}</div>
                            <div class="text-primary">{{$blog->created_at->format('d-M-Y')}}</div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
