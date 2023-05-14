<?php

namespace App\Http\Controllers;

use App\Models\Filters;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home() 
    {
        $filters = Filters::all()->groupBy('name');
        $locations = Location::all();
        $cats = Category::all();

        return view('index', compact('filters', 'cats', 'locations'));
    }

    public function contact() 
    {
        return view('contact');
    }

    public function about() 
    {
        return view('about');
    }

    public function terms() 
    {
        return view('terms');
    }
}
