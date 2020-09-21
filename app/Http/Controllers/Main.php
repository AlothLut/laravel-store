<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class Main extends Controller
{
    public function index(Request $request)
    {
        return view('main');
    }

    public function category($category)
    {
        $categoryObject = Category::where('code', $category)->first();

        return view('category');
    }
}
