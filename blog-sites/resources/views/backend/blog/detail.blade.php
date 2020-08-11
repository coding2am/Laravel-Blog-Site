@extends('layouts.master')
@section('title','Detail')
@section('content')
    <div class="container-fluid col-sm-12 offset-sm-0 col-md-8 offset-md-2">
        <div class="card col-sm-12 mb-3 p-4">
            <p class="card-title"><b>{{$blog->title}}</b></p>
            <h5 class="text-info">Date: {{$blog->created_at->format('d-M-Y')}}</h5>
            <p class="card-text"><small class="text-muted">Last updated {{$blog->created_at->diffForHumans()}}</small></p>
            @if($blog->image != null)
                <img src="{{asset('/uploads/'.$blog->image)}}" class="card-img-top h-50">
            @else
            @endif
            <div class="card-body text">
                <p class="text-dark">{!! $blog->content !!}</p>
            </div>
            <div class="em-wapper mb-2">
                <div class="em-context">
                    {!! $blog->video !!}
                </div>
            </div>
            <div class="card bg-light p-3 mb-3">
                    @foreach($blog->comments as $comment)
                        <div class="alert alert-info">
                            <h5 class="text-primary">{{$comment->user->name}}</h5>
                            <p class="text text-dark">{{$comment->comment}}</p>
                            <div class="float-right text-success">{{$comment->created_at->diffForHumans()}}</div>
                            <div class="float-right text-success"></div>
                        </div>
                    @endforeach
            <hr class="border-dark">
            <div>
                <h4 class="text-info">Comment</h4>
                <form method="post" action="{{url('comments/add')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <textarea name="comment" class="form-control" rows="3"></textarea>
                    </div>
                    <input type="hidden" name="blog_id" value="{{$blog->id}}">
                    @if(Auth::user())
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    @endif
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Can't comment becaues you didn't write anything!</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endforeach
                    @if(session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{session('status')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <input type="submit" class="btn btn-outline-success" value="Submit">
                </form>
            </div>
            </div>
            <a target="_blank" href="https://web.facebook.com/myanmarlabournews" class="btn btn-block btn-outline-info">Go to Facebook Page</a>
            <a href="{{asset('/')}}" class="btn btn-block btn-outline-info">Back</a>
    </div>
    </div>
@endsection
