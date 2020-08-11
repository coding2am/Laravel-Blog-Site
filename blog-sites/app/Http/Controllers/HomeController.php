<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
////        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $blogs = Blog::orderBy('id','desc')->paginate(3);
        return view('frontend.dashboard_three',compact('blogs'));
    }
    public function new()
    {
        $blogs = Blog::orderBy('id','desc')->paginate(5);
        return view('frontend.news',compact('blogs'));
    }
    public function video()
    {
        $blogs = Blog::all()->sortByDesc('id');
        return view('frontend.videos',compact('blogs'));
    }
    public function about()
    {
        return view('frontend.about');
    }
    public function feature()
    {
        $blogs = Blog::all()->sortByDesc('id');
        return view('frontend.feature',compact('blogs'));
    }
    public function publication()
    {
        $blogs = Blog::all()->sortByDesc('id');
        return view('frontend.publication',compact('blogs'));
    }
    public function election()
    {
        $blogs = Blog::all()->sortByDesc('id');
        return view('frontend.election',compact('blogs'));
    }
    public function intro()
    {
        return view('frontend.intro');
    }
    public function term()
    {
        return view('frontend.term');
    }
    public function privacy()
    {
        return view('frontend.privacy');
    }
}
