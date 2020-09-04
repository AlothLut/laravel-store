<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Main extends Controller
{
    public function index(Request $request)
    {
        return view('main');
    }
}
