<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\PropertyRequest;
use App\Property;
use App\County;
use App\PropertyCategory;
use App\Image;
use App\Message;

class agentsPropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $properties = Property::where('fk_user_id',$user_id)->simplePaginate(5);

        $messages = Message::where([ 'user_id' => Auth::id(), 'seen' =>false])->take(4)->get();
        
        // return response(['data' => $properties ], 201);
        return view('pages.agent.agents_listings', ['properties' => $properties, 'messages' => $messages]);
    }

    public function add_category(Request $request)
    {
        $category = PropertyCategory::create($request->all());
        
        return response(['category' => $category], 201);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $messages = Message::where([ 'user_id' => Auth::id(), 'seen' =>false])->take(4)->get();

        $counties = County::get();
        $categories = PropertyCategory::get();

        return view('pages.agent.createListing', [
            'counties' => $counties,
            'categories' => $categories,
            'messages' => $messages
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->middleware('auth');
        $request->merge(['fk_user_id' => Auth::id()]);
        $request->merge(['status' => 0]);

        $property = Property::create($request->all());

        // return storage_path();
        // return $request->file('images');
        foreach ($request->file('images') as $index => $item) {

            $path = $request->file('images')[$index]->storePublicly('listings');

            Image::create(['image_path'=> explode('/', $path)[1],
                'fk_property_id' => $property->property_id,
            ]);
        }

        return redirect('/agents/listing')->with('success', 'Property Created !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property = Property::findOrFail($id);

        return response(['data', $property ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property = Property::findOrFail($id);

        $counties = County::get();
        $categories = PropertyCategory::get();

        $messages = Message::where([ 'user_id' => Auth::id(), 'seen' =>false])->take(4)->get();

        return view('pages.agent.agents_listings_edit', [
            'property' => $property,
            'counties' => $counties,
            'categories' => $categories,
            'messages' => $messages
        ]);
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
        $property = Property::findOrFail($id);
        $property->update($request->all());

        return redirect('/agents/listing')->with('success', 'Property Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Property::destroy($id);

        return redirect('/agents/listing')->with('success', 'Property Deleted!');
    }
}
