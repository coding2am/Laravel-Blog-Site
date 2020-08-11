@extends('backend.admindashboard')
@section('adminContent')
   <div class="row">
       <img class="m-auto col-md-7 col-sm-5" src="{{asset('images/adminpanel.gif')}}" alt="">
   </div>
    <div>
        <h1 class="text-center text-info">{{Auth::user()->name}}</h1>
    </div>
@endsection
