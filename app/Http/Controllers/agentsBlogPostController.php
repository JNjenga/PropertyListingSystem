<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\BlogPostRequest;
use App\BlogCategory;
use App\BlogPost;
use App\Message;


class agentsBlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->middleware('auth');
        $posts = BlogPost::latest()->simplePaginate(2);

        $messages = Message::where([ 'user_id' => Auth::id(), 'seen' =>false])->take(4)->get();

        return view('pages.agent.agents_blog', ['posts' => $posts,'messages' => $messages])
            ->with('success', 'works');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_category(Request $request)
    {
        $category = BlogCategory::create($request->all());
        
        return response(['category' => $category], 201);
    }

    public function create()
    {
        $categories = BlogCategory::get();
        $messages = Message::where([ 'user_id' => Auth::id(), 'seen' =>false])->take(4)->get();

	    return view('pages.agent.agents_blog_create',['categories' => $categories, 'messages' => $messages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blogpost = BlogPost::create($request->all());
        
        return redirect('/agents/blog')->with('success', 'Article created successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blogpost = BlogPost::findOrFail($id);

        return response(['data', $blogpost ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = BlogPost::find($id);
        $categories = BlogCategory::get();

        $messages = Message::where([ 'user_id' => Auth::id(), 'seen' =>false])->take(4)->get();

        // return $categories;
	    return view('pages.agent.agents_blog_edit', compact('categories','post', 'messages'));//->with('post');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blogpost = BlogPost::findOrFail($id);
        $blogpost->update($request->all());

        $blogpost->save();

        return redirect('/agents/blog')->with('success', 'Blog Post Created!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BlogPost::destroy($id);

        return response(['data' => null ], 204);
    }
}
