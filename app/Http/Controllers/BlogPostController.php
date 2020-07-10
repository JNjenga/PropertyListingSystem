<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\BlogPostRequest;
use App\BlogCategory;
use App\BlogPost;
use App\Message;

class BlogPostController extends Controller
{
    public function index()
    {
        $this->middleware('auth');
        $posts = BlogPost::latest()->simplePaginate(2);

        $messages = Message::where([ 'user_id' => Auth::id(), 'seen' =>false])->take(4)->get();

        return view('pages.admin.admin_blog', ['posts' => $posts,'messages' => $messages])
            ->with('success', 'works');
    }

    public function index_client()
    {
        $posts = BlogPost::latest()->simplePaginate(2);

        return view('pages.blog', ['posts' => $posts]);
    }

    public function add_category(Request $request)
    {
        $category = BlogCategory::create($request->all());
        
        return response(['category' => $category], 201);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    $categories = BlogCategory::get();
        $messages = Message::where([ 'user_id' => Auth::id(), 'seen' =>false])->take(4)->get();

	    return view('pages.admin.admin_blog_create',['categories' => $categories, 'messages' => $messages]);

    }


    public function store(BlogPostRequest $request)
    {

        $blogpost = BlogPost::create($request->all());
        
        return redirect('/admin/blog')->with('success', 'Article created successfully !');
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

        $messages = Message::where([ 'user_id' => Auth::id(), 'seen' =>false])->take(4)->get();

        // return $categories;
	    return view('pages.admin.admin_blog_edit', compact('categories','post', 'messages'));//->with('post');
    }

    public function show($id)
    {
        $blogpost = BlogPost::findOrFail($id);

        return response(['data', $blogpost ], 200);
    }

    public function show_client($id)
    {
        $blogpost = BlogPost::findOrFail($id);

	    return view('pages.blog_specific', compact('blogpost'));// ->with('categories', $categories);
    }



    public function update(BlogPostRequest $request, $id)
    {
        $blogpost = BlogPost::findOrFail($id);
        $blogpost->update($request->all());

        $blogpost->save();

        return redirect('/admin/blog')->with('success', 'Blog Post Created!');
    }

    public function destroy($id)
    {
        BlogPost::destroy($id);

        return redirect('/admin/blog')->with('success', 'Blog Post Deleted!');
    }
}
