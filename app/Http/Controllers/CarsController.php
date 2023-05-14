<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Filters;
use App\Models\Location;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    public function cars() 
    {
        $cars = Car::all();

        return view('cars', compact('cars'));
    }

    public function car($id) 
    {
        $locations = Location::all();
        $car = Car::where('id', $id)->first();

        if (!$car) 
        {
            return abort(404);
        }

        $filterids = $car->filters()->pluck('filter_id')->toArray();
        $filters = Filters::whereIn('id', $filterids)->get();

        return view('single-car', compact('car', 'filters', 'locations'));
    }
}
