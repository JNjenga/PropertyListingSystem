<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests\PropertyRequest;
use App\Property;
use App\County;
use App\PropertyCategory;
use App\Image;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::latest()->simplePaginate(5);
        
        // return response(['data' => $properties ], 201);
        return view('pages.admin.admin_listings', compact('properties'));
    }

    public function index_client()
    {
        $properties = Property::latest()->simplePaginate(3);
        return view('pages.customer.view_listings', ['properties' => $properties]);
    }

    public function store(PropertyRequest $request)
    {
        $this->middleware('auth');
        $request->merge(['fk_user_id' => Auth::id()]);
        $request->merge(['status' => 0]);

        $property = Property::create($request->all());


        // return $request->file('images');
        foreach ($request->file('images') as $index => $item) {
                $path = $request->file('images')[$index]->store('public/listings/images');

                Image::create(['image_path'=> substr($path,7),
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
