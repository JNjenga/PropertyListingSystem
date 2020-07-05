<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;
use App\BlogPost;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
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

        $properties = Property::latest()->get();
        $prop1 = array();
        $prop2 = array();

        if($properties->count() > 1){
            $prop1 = $properties[0];
            $prop2 = $properties[1];
        }else if($properties->count() == 1)
        {
            $prop1 = $properties[0];
        }
        $article1 = BlogPost::latest()->get()[0];
        return view('pages.index', compact('prop1',  'prop2', 'article1'));
    }
}
