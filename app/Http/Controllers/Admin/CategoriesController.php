<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::leftJoin('cars', 'categories.id', '=', 'cars.category_id')
                ->groupBy('categories.id', 'categories.name')
                ->select('categories.id', 'categories.name', DB::raw('COUNT(cars.id) as cars_count'))
                ->orderBy('id', 'DESC')
                ->get();


        return view('admin.cats', ['categories' => $categories]);
    }

    public function delete($id)
    {
        $category = Category::where('id', $id)->first();

        if ($category) 
        {
            $category->delete();
        }

        return redirect()->back();
    }

    public function create(Request $request)
    {
        $request->validate(['name' => 'required']);
        $cat = $request->input('name');

        Category::create([
            'name' => $cat
        ]);

        return redirect(route('categories'));
    }
}
