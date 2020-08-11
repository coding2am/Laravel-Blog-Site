<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Pacifico&display=swap');
    .titlefont {
        font-family: 'Pacifico', cursive;
        font-size: 13px;
    }
    .em-wapper{
        clear: both;
        margin-top: 32px;
    }
    .em-context{
        position:relative;
        padding-top:56.25%; /*height รท width = aspect ratio.*/
    }
    .em-context>iframe{
        position:absolute;
        top:0;
        left:0;
        width:100%;
        height:100%;
        border:0;
    }
    @media (min-width: 320px) {
        .head{font-size: 0.7rem;}
        .btext{font-size: 0.8rem;}
    }
    @media (min-width: 544px) {

        .head{font-size: 1rem;}
        .btext{font-size: 0.7rem;}
    }
    @media (min-width: 768px) {
        h1 {font-size:2rem;} /*1rem = 16px*/
    }

    @media (min-width: 992px) {
        h5 {font-size:1rem; }
    }
    @media (min-width: 1200px) {

    }
</style>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="#">
            <img src="{{asset('images/logo.jpg')}}" width="30" height="30"><span class="text-danger ml-1 titlefont">Myanmar Labour News Media</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
{{--                {{dd(Auth::user()->roles()->pluck('name'))}}--}}
                @if(Auth::user())
                    @if(Auth::user()->roles()->pluck('name')->contains('Manager') || Auth::user()->roles()->pluck('name')->contains('Supervisor'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{asset('/admin/manager')}}">Admin Panel</a>
                        </li>
                    @endif
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{asset('/')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{asset('/news')}}">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{asset('/feature')}}">Feature</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{asset('/videos')}}">Videos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{asset('/publication')}}">Publication</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{asset('/election')}}">Election</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{asset('/about')}}">About us</a>
                </li>
                <li class="nav-item dropdown">
                   @if(Auth::user())
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{Auth::user()->name}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{asset('/logout')}}" onclick="return confirm('Are you sure? ')">Logout</a>
                        </div>
                   @else
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Members
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{asset('/login')}}">Login</a>
                            <a class="dropdown-item" href="{{asset('/register')}}">Register</a>
                       </div>
                   @endif
                </li>
            </ul>
        </div>
    </nav>
    <div><br></div>
    <div class="mt-5">
        @yield('content')
    </div>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'content' );
    </script>
</body>
</html>
