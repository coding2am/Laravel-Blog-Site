@extends('layouts.master')
@section('title','Home')
@section('content')
    <div class="container">
        <div class="col-md-12 col-sm-12">
            <h1 class="text text-center text-dark">
                <marquee>Myanamar Labour News Media</marquee>
            </h1>
            <div class="row mt-5">
                <div class="card col-md-4 col-sm-12 offset-sm-0 mb-4 rounded-0 border-primary p-3">
                    <div class="card-body">
                        <h3 class="card-title text-info">Myanmar Labour News</h3>
                        <h3 class="card-title text-info"> Digital Media မိတ်ဆက်</h3>
                        <a href="{{asset('/intro')}}">
                            <img style="opacity: 0.5;" src="{{asset('images/about.svg')}}">
                        </a>
                    </div>
                </div>
                <div class="card col-md-4 col-sm-12 offset-sm-0 mb-4 rounded-0 border-primary p-3">
                    <div class="card-body">
                        <h3 class="card-title text-info">PRIVACY AND</h3>
                        <h3 class="card-title text-info">POLICY</h3>
                        <a href="{{asset('/privacy')}}">
                            <img style="opacity: 0.5;" src="{{asset('images/privacy.svg')}}">
                        </a>
                    </div>
                </div>
                <div class="card col-md-4 col-sm-12 offset-sm-0 mb-4 rounded-0 border-primary p-3">
                    <div class="card-body">
                        <h3 class="card-title text-info">TERMS AND </h3>
                        <h3 class="card-title text-info">CONDITIONS</h3>
                        <a href="{{asset('/term')}}">
                            <img style="opacity: 0.5;" src="{{asset('images/term.svg')}}">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
