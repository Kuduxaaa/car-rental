<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrdersController extends Controller
{
    public function create(Request $request)
    {
        $rules = [
            'fname' => 'required|string',
            'lname' => 'required|string',
            'birthdate' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'pickup-date' => 'required|date',
            'dropoff-date' => 'required|date|after_or_equal:pickup-date',
            'communicate_with' => 'required|string',
            'car_id' => 'required|string',
            'price' => 'required|string',
            'pickup-loc' => 'required|string',
            'dropoff-loc' => 'required|string'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        } 

        $data = $validator->validated();
        $data['pickup-date'] = Carbon::createFromFormat('Y-m-d\TH:i', $data['pickup-date']);
        $data['dropoff-date'] = Carbon::createFromFormat('Y-m-d\TH:i', $data['dropoff-date']);
        $data['birthdate'] = Carbon::createFromFormat('m/d/Y', $data['birthdate']);

        $ploc = Location::where('name', $data['pickup-loc'])->first();
        $tprice = (intval($data['price']) + intval($ploc->price));
        
        Order::create([
            'first_name' => $data['fname'],
            'last_name' => $data['lname'],
            'birth_date' => $data['birthdate'],
            'phone_number' => $data['phone'],
            'email' => $data['email'],
            'communicate_with' => $data['communicate_with'],
            'car_id' => $data['car_id'],
            'pickup_date' => $data['pickup-date'],
            'dropoff_date' => $data['dropoff-date'],
            'pickup_loc' => $data['pickup-loc'],
            'dropoff_loc' => $data['dropoff-loc'],
            'totalp' => $tprice
        ]);

        return redirect()->back()->with('success', 'Order created successfully');
    }
}
