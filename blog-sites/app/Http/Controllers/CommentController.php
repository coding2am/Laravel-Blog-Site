<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function add()
    {
        $validator = validator(request()->all(),[
           'comment'=>'required'
        ]);
        if($validator->fails())
        {
            return back()->withErrors($validator);
        }
        $comment = new Comment();
        $comment->comment = request()->comment;
        $comment->blog_id = request()->blog_id;
        $comment->user_id = request()->user_id;
        $comment->save();
        return redirect('blog/detail/'.\request()->blog_id)->with('status','Commented successfully.');
    }
}
