<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Models\Filters;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\CarFilters;
use App\Models\Order;
use Illuminate\Support\Facades\Storage;

class CarsController extends Controller
{
    public function index() 
    {
        $categories = Category::all();
        $filters = Filters::all()->groupBy('name');
        $cars = Car::orderBy('id', 'DESC')->get();

        return view('admin.cars', compact('categories', 'filters', 'cars'));
    }

    public function edit($id) 
    {
        $car = Car::where('id', $id)->first();
        $categories = Category::all();
        $filters = Filters::all()->groupBy('name');

        if (!$car) 
        {
            return abort(404);
        }

        return view('admin.edit-car', compact('categories', 'filters', 'car'));
    } 

    public function edit_perform($id, Request $request) 
    {
        $validator = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'description' => 'required',
            'filters.*' => 'array|min:1',
            'filters.*.*' => 'string|max:255',
        ]);

        $filters = $validator['filters'] ?? null;
        $category = Category::where('name', $validator['category'])->first();
        $car = Car::where('id', $id)->first();

        if (!$category || !$car) {
            return abort(404);
        }

        $car->update([
            'name' => $validator['name'],
            'price' => $validator['price'],
            'category_id' => $category->id,
            'description' => $validator['description']
        ]);

        if (!is_null($filters))
        {
            foreach ($filters as $key => $value) {
                $filterIds = Filters::where('name', $key)->pluck('id')->toArray();
                $filter = Filters::where('name', $key)->where('value', $value[0])->first();
    
                if (!$filter) {
                    $filter = Filters::create([
                        'name' => $key,
                        'value' => $value[0],
                    ]);
                }
    
                $car_filter = CarFilters::where('car_id', $car->id)->whereIn('filter_id', $filterIds)->first();
                $cf = CarFilters::where('car_id', $car->id)->where('filter_id', $car_filter->filter_id)->first();

                if ($cf)
                {
                    $cf->delete();
                }
                
                CarFilters::create([
                    'car_id' => $car->id,
                    'filter_id' => $filter->id,
                ]);
            }
        }

        return redirect(route('cars'));
    }

    public function create(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string',
            'price' => 'required|integer',
            'category' => 'required|string',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'filters.*' => 'required|array|min:1',
            'filters.*.*' => 'required|string|max:255',
        ]);

        $category = Category::where('name', $validator['category'])->first();
        if (!$category) {
            return redirect()->back()->withErrors(['error' => 'Category not found']);
        }

        $image_paths = [];
        foreach ($request->file('images') as $image) {
            $path = $image->store('public/uploads');
            $image_paths[] = Storage::url($path);
        }

        $car = Car::create([
            'name' => $validator['name'],
            'images' => json_encode($image_paths),
            'description' => $request->input('description'),
            'price' => $validator['price'],
            'category_id' => $category->id,
        ]);

        foreach ($validator['filters'] as $key => $value) {
            $filter = Filters::where('name', $key)->where('value', $value[0])->first();

            if (!$filter) {
                $filter = Filters::create([
                    'name' => $key,
                    'value' => $value[0],
                ]);
            }

            CarFilters::create([
                'car_id' => $car->id,
                'filter_id' => $filter->id,
            ]);
        }

        return redirect()->back();
    }


    public function delete($id)
    {
        $car = Car::where('id', $id)->first();

        if ($car) 
        {
            $car_filters = CarFilters::where('car_id', $car->id)->get();
            $ordersAssocCar = Order::where('car_id', $car->id)->get();

            foreach ($ordersAssocCar as $carOrd) 
            {
                if ($carOrd) 
                {
                    $carOrd->delete();
                }
            }

            foreach ($car_filters as $car_filter) {
                $car_filter->delete();
            }

            $car->delete();
        }

        return redirect()->back();
    }

}
