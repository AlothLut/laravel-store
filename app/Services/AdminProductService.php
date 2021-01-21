<?php
namespace App\Services;

use App\Category;
use App\Product;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AdminProduct;

class AdminProductService
{
    public function getCreate(AdminProduct $request)
    {
        $category = Category::where('active', true)
            ->get()
            ->map(function ($item) {
                $localeElement = $item->toArray();
                setElementLang($localeElement);
                return [
                    'id' => $item->id,
                    'name' => $localeElement['locale']['name'],
                ];
            });

        $fields = DB::select(DB::raw('show fields from ' . Product::getTableName()));

        return [
            'category' => $category,
            'fields' => $fields
        ];
    }
}
