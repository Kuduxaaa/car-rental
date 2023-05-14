<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function index() 
    {
        $orders = Order::orderBy('id', 'DESC')->get();

        return view('admin.orders', ['orders' => $orders]);
    }
}
