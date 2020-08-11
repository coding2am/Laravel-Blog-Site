<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Comment;
use App\BlogType;
use Illuminate\Http\Request;
use App\Http\Requests\blogRequest;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('backend.blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(blogRequest $request)
    {
        $file = $request->file('file');
        if($file == null)
        {
            $blog = new Blog();
            $blog->title = $request->get('title');
            $blog->video = $request->get('video');
            $blog->content = $request->get('content');
            $blog->blog_type = $request->get('blogtype');
            $blog->save();
            return redirect('admin/blog/create')->with('status','Blog has been successfully created.');
        }
        $file = $request->file('file');
        $fileName = uniqid().'_'.$file->getClientOriginalName();
        $file->move(public_path().'/uploads',$fileName);
        $blog = new Blog();
        $blog->title = $request->get('title');
        $blog->image = $fileName;
        $blog->video = $request->get('video');
        $blog->content = $request->get('content');
        $blog->blog_type = $request->get('blogtype');
        $blog->save();
        return redirect('admin/blog/create')->with('status','Blog has been successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::find($id);
        return view('backend.blog.show',compact('blog'));
    }
    public function detail($id)
    {
        $blog = Blog::find($id);
        return view('backend.blog.detail',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('backend.blog.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(blogRequest $request, $id)
    {
        $blog = Blog::find($id);
        $blog->title = $request->get('title');
        $blog->video = $request->get('video');
        $blog->content = $request->get('content');
        $blog->blog_type = $request->get('blogtype');
        if($request->hasFile('file'))
        {
            //RemovingOldFile
            $oldfile =$request->get('old_file');
            unlink(public_path().'/uploads/'.$oldfile);
            //ReplacingWithNewFile
            $newFile = $request->file('file');
            $newFileName = uniqid().'_'.$newFile->getClientOriginalName();
            $newFile->move(public_path().'/uploads',$newFileName);
            $blog->image =$newFileName;
            $blog->update();
            return redirect('admin/blogs')->with('status','Blog id '. $id.' is successfully updated.');
        }
        $blog->update();
        return redirect('admin/blogs')->with('status','Blog id '. $id.' is successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        if($blog->image != null)
        {
            unlink(public_path().'/uploads/'.$blog->image);
        }
        $blog->delete();
        return redirect('admin/blogs')->with('status','Blog'.$id.' is successfully deleted.');
    }
}
