<?php

namespace App\Http\Controllers\Admin;

use App\Models\Filters;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FiltersController extends Controller
{
    public function index() 
    {
        $filters = Filters::all();

        return view('admin.filters', ['filters' => $filters]);
    }

    public function delete($id)
    {
        $filter = Filters::where('id', $id)->first();

        if ($filter)
        {
            $filter->delete();
        }

        return redirect()->back();
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'value' => 'required|string',
        ]);

        $name = $request->input('name');
        $value = $request->input('value');

        Filters::create([
            'name' => $name,
            'value' => $value
        ]);

        return redirect()->back();
    }
}
