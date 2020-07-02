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

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::latest()->simplePaginate(5);

        $messages = Message::where([ 'user_id' => Auth::id(), 'seen' =>false])->take(4)->get();
        
        // return response(['data' => $properties ], 201);
        return view('pages.admin.admin_listings', ['properties' => $properties, 'messages' => $messages]);
    }

    public function index_client()
    {
        $properties = Property::latest()->simplePaginate(3);
        return view('pages.customer.view_listings', ['properties' => $properties]);
    }

    public function add_category(Request $request)
    {
        $category = PropertyCategory::create($request->all());
        
        return response(['category' => $category], 201);
    }


    public function store(PropertyRequest $request)
    {
        $this->middleware('auth');
        $request->merge(['fk_user_id' => Auth::id()]);
        $request->merge(['status' => 0]);

        $property = Property::create($request->all());

        // return storage_path();
        // return $request->file('images');
        foreach ($request->file('images') as $index => $item) {
                $path = $request->file('images')[$index]->storePublicly('listings');
                Image::create(['image_path'=> $path,
                    'fk_property_id' => $property->property_id,
                ]);
        }
        return redirect('/admin/listings')->with('success', 'Property Created !');
    }

    public function create()
    {

        $counties = County::get();
        $categories = PropertyCategory::get();

        return view('pages.admin.admin_listings_create', [
            'counties' => $counties,
            'categories' => $categories
        ]);

    }


    public function edit($id)
    {
        $property = Property::findOrFail($id);

        $counties = County::get();
        $categories = PropertyCategory::get();

        return view('pages.admin.admin_listings_edit', [
            'property' => $property,
            'counties' => $counties,
            'categories' => $categories
        ]);

    }

    public function show_client($id)
    {
        $property = Property::findOrFail($id);

         return view('pages.customer.view_specific_listings', [
            'property' => $property
        ]);

    }

    public function show($id)
    {
        $property = Property::findOrFail($id);

        return response(['data', $property ], 200);
    }

    public function update(PropertyRequest $request, $id)
    {
        $property = Property::findOrFail($id);
        $property->update($request->all());

        return redirect('/admin/listings')->with('success', 'Property Updated!');
    }

    public function destroy($id)
    {
        Property::destroy($id);

        return redirect('/admin/listings')->with('success', 'Property Deleted!');
    }
}
