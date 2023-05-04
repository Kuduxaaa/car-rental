<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home() {
        return view('index');
    }

    public function contact() {
        return view('contact');
    }

    public function about() {
        return view('about');
    }

    public function cars() {
        return view('cars');
    }

    public function terms() {
        return view('terms');
    }
}
