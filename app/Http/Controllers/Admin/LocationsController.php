<?php

namespace App\Http\Controllers\Admin;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationsController extends Controller
{
    public function index () 
    {
        $locations = Location::orderBy('id', 'DESC')->get();
        
        return view('admin.locations', compact('locations'));
    }

    public function create (Request $request) 
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|integer',
            'type' => 'required|string',
        ]);

        $name = $request->input('name');
        $price = $request->input('price');
        $type = $request->input('type');

        Location::create([
            'name' => $name,
            'price' => $price,
            'type' => $type
        ]);

        return redirect()->back()->with('success', 'Location created');
    }

    public function delete ($id)
    {
        $loc = Location::where('id', $id)->first();

        if ($loc) 
        {
            $loc->delete();
        }

        return redirect()->back();
    }
}
