<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Categories extends Controller
{
    public function index(Request $request)
    {
        return view('main');
    }

    public function category($category)
    {
        return view('main');
    }
}
