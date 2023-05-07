<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Car;
use App\Models\Filters;
use App\Models\Category;
use Illuminate\Http\Request;

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
        $request->validate([
            'category' => 'nullable|exists:categories,id',
            'pickup_date' => 'nullable|date_format:Y-m-d\TH:i:s',
            'dropoff_date' => 'nullable|date_format:Y-m-d\TH:i:s',
            'filters' => 'nullable|array',
            'filters.*' => 'nullable|array',
            'filters.*.*' => 'nullable|string',
        ]);

        $query = Car::query();

        if ($request->filled('category')) {
            $query->where('category_id', $request->input('category'));
        }

        if ($request->filled('pickup_date') && $request->filled('dropoff_date')) {
            $pickup = Carbon::createFromFormat('Y-m-d\TH:i:s', $request->input('pickup_date'));
            $dropoff = Carbon::createFromFormat('Y-m-d\TH:i:s', $request->input('dropoff_date'));

            $query->whereDoesntHave('reservations', function ($query) use ($pickup, $dropoff) {
                $query->where('pickup_date', '<', $dropoff)
                      ->where('dropoff_date', '>', $pickup);
            });
        }

        if ($request->filled('filters')) {
            foreach ($request->input('filters') as $name => $values) {
                $query->whereHas('filters', function ($query) use ($name, $values) {
                    $query->where('name', $name)->whereIn('value', $values);
                });
            }
        }

        $results = $query->get();

        return view('search-results', compact('results'));
    }
}
