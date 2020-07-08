<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->middleware('auth');
        return view('pages.admin.admin_dash');
    }

    public function index_client()
    {
        $prop1 = Property::latest()->get()[0];
        $prop2 = Property::latest()->get()[1];
        $article1 = BlogPost::latest()->get()[0];
        return view('pages.index', compact('prop1', 'prop2', 'article1'));
    }
}
