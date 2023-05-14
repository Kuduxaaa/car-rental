<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Car;
use App\Models\Filters;
use App\Models\Category;
use App\Models\CarFilters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SearchController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $filters = Filters::all()->groupBy('name');

        return view('test', compact('categories', 'filters'));
    }

    public function search(Request $request)
    {
        $rules = [
            'category.*' => 'sometimes|string',
            'filters.*.*' => 'required|string|max:255',
        ];

        $query = Car::query();
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        } 

        $requestData = $validator->validated();
        $filters = $requestData['filters'] ?? [];
        $categories = $requestData['category'] ?? [];

        $keys = [];
        $values = [];

        foreach ($filters as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $item) {
                    $keys[] = $key;
                    $values[] = $item;
                }
            }
        }

        $query = Car::query();
        $categoryIds = count($categories) > 0
            ? Category::whereIn('name', $categories)
                ->pluck('id')
                ->toArray()
            : Category::pluck('id')->toArray();
        
        $query->join('car_filter', 'cars.id', '=', 'car_filter.car_id')
              ->join('filters', 'car_filter.filter_id', '=', 'filters.id')
              ->whereIn('cars.category_id', $categoryIds)
              ->whereIn('filters.name', $keys)
              ->whereIn('filters.value', $values);
        
        $cars = $query->select('cars.*')
                      ->groupBy('cars.id', 'cars.name', 'cars.images', 'cars.description', 'cars.price', 'cars.category_id', 'cars.created_at', 'cars.updated_at')
                      ->havingRaw('COUNT(*) = ?', [count($filters)])
                      ->get();


        return view('cars', compact('cars'));
    }
}
