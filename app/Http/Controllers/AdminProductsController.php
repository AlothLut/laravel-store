<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminProduct;
use App\ProdictsImages;
use App\Product;
use App\Services\AdminProductService;
use Illuminate\Http\Request;

class AdminProductsController extends Controller
{
    private $adminProductService;

    public function __construct(
        AdminProductService $adminProductService
    ) {
        $this->adminProductService = $adminProductService;
    }

    public function create(AdminProduct $request)
    {
        return view(
            'catalog-product.create',
            $this->adminProductService->getCreate($request)
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'images.*' => config('validate.products.image'),
            'name' => 'required',
            'code' => 'required',
        ]);
        $product = new Product();
        $product->name = request('name');
        $product->code = request('code');
        $product->name_ru = request('name_ru');
        $product->name_en = request('name_en');
        $product->description_ru = request('description_ru');
        $product->description_en = request('description_en');
        $product->save();
        if ($request->hasFile('images') && isset($product->id)) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $path = $image->store('images');
                $productImage = new ProdictsImages();
                $productImage->image_src = $path;
                $productImage->product_id = $product->id;
                $productImage->save();
            }
        }

        return redirect('/catalog/create');
    }
}
