<?php

namespace App\Http\Controllers;

use App\BlogPost;
use App\BlogCategory;
use DB;
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
	//
	return view('pages.admin.admin_blog', ['posts' => BlogPost::all()]);
    }

    public function clientIndex()
    {
    //
    $posts = DB::table('tbl_blog_post')->paginate(2);

	return view('pages.blog', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    $categories = BlogCategory::get();
	    return view('pages.admin.admin_blog_create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    //
	    // $post = BlogPost::create();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	    $post = BlogPost::find($id);
	    $categories = BlogCategory::get();
        return view('pages.admin.admin_blog_edit', compact('post'))->with('categories', $categories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	    $post = BlogPost::find($id);
	    $categories = BlogCategory::get();
	    return view('pages.admin.admin_blog_edit', compact('post'))->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $blogPost)
    {
        //
    }
}
