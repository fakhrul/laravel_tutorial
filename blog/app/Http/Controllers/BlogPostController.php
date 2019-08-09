<?php

namespace App\Http\Controllers;

use App\BlogPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog_posts = BlogPost::latest()->paginate(5);
  
        return view('blog_posts.index',compact('blog_posts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog_posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
  
        BlogPost::create($request->all());
   
        return redirect()->route('blog_posts.index')
                        ->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $blog_post)
    {
        return view('blog_posts.show',compact('blog_post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $blog_post)
    {
        return view('blog_posts.edit',compact('blog_post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPost $blog_post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
  
        $blog_post->update($request->all());
  
        return redirect()->route('blog_posts.index')
                        ->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $blog_post)
    {
        $blog_post->delete();
  
        return redirect()->route('blog_posts.index')
                        ->with('success','Post deleted successfully');
    }
}
