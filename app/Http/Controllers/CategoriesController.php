<?php

namespace App\Http\Controllers;

use App\Model\Category;

class CategoriesController extends Controller
{
    public function index($code)
    {
        $category = Category::where('code', $code)->first();
        return view('category',['category' => $category['name']]);
    }
}
