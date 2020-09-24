<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Main extends Controller
{
    public function index(Request $request)
    {
        $categories = DB::table('categories')->get();
        return view('main',['categories' => $categories]);
    }

    public function category($category)
    {
        $categoryObject = Category::where('code', $category)->first();

        return view('category');
    }
}
