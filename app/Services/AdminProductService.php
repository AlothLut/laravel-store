<?php
namespace App\Services;

use App\Http\Requests\AdminProductStore;
use App\Http\Requests\AdminProductUpdate;
use App\Model\Category;
use App\Model\ProdictsImages;
use App\Model\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class AdminProductService
{
    /**
     * Returns all productns form db
     * @return array
     */
    public function handleIndex(): array
    {
        $products = Product::get();

        return [
            'products' => $products,
        ];
    }

    /**
     * Returns a fields to create a product
     * @return array
     */
    public function handleCreate(): array
    {
        $category = self::getCategories();
        return ['category' => $category];
    }

    /**
     * Create product and Image
     * @param \App\Http\Requests\AdminProductStore $request
     */
    public function handleStore(AdminProductStore $request): void
    {
        $product = Product::create($request->all());
        self::saveImage($request, $product);
    }

    /**
     * @param Product $product
     */
    public function handleShow(Product $product): array
    {
        return self::getProductParams($product);
    }

    /**
     * @param Product $product
     */
    public function handleEdit(Product $product): array
    {
        return self::getProductParams($product);
    }

    /**
     * @param \App\Http\Requests\AdminProductUpdate $request
     * @param Product $product
     */
    public function handleUpdate(AdminProductUpdate $request, Product $product)
    {
        self::destroyImages($request->input('remove_image'));
        $product->update($request->toArray());
        self::saveImage($request, $product);
    }

    public function handleDestroy(Product $product)
    {
        self::destroyImages([], $product);
        $product->delete();
    }

    /**
     * Get array with params for product
     * @param Product $product
     * @return array
     */
    private static function getProductParams(Product $product): array
    {
        $category = self::getCategories();
        $productImages = ProdictsImages::where('product_id', $product->id)->get();
        $productLoc = $product->toArray();
        loc($productLoc);

        return [
            'images' => $productImages->toArray(),
            'product' => $product,
            'category' => $category,
            'productLoc' => $productLoc,
        ];
    }

    private static function getCategories()
    {
        return Category::where('active', true)
            ->get()
            ->map(function ($item) {
                $localeElement = $item->toArray();
                loc($localeElement);
                return [
                    'id' => $item->id,
                    'name' => $localeElement['locale']['name'],
                ];
            });
    }

    /**
     * save image on disk and db
     * @param \Illuminate\Foundation\Http\FormRequest $request
     * @param \App\Model\Product $product
     */
    private static function saveImage(FormRequest $request, Product $product)
    {
        if ($request->hasFile('images') && isset($product->id)) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $path = $image->store('images', 'public');
                $productImage = new ProdictsImages();
                $productImage->image_src = $path;
                $productImage->product_id = $product->id;
                $productImage->save();
            }
        }
    }

    /**
     * delete image form disk and db
     * @param array|null $id
     * @param Product|null $product
     */
    private static function destroyImages($id = [], Product $product = null)
    {
        if (isset($product)) {
            $images_to_remove = ProdictsImages::where('product_id', $product->id)->get();
        } else {
            $images_to_remove = ProdictsImages::find($id);
        }
        
        if (!isset($images_to_remove)) {
            return;
        }
        $images_to_remove = $images_to_remove->all();
        $id_images = [];
        $paths = [];
        foreach ($images_to_remove as $image) {
            $id_images[] = $image->id;
            $paths[] = 'public/' . $image->image_src;
        }
        ProdictsImages::destroy($id_images);
        Storage::delete($paths);
    }
}
