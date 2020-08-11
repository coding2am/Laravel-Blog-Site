<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class NormalUserController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('id','desc')->paginate(3);
        return view('frontend.dashboard_three',compact('blogs'));
    }
}
