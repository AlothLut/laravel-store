<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminProductStore;
use App\Http\Requests\AdminProductUpdate;
use App\Model\Product;
use App\Services\AdminProductService;

class AdminProductsController extends Controller
{
    private $adminProductService;

    public function __construct(
        AdminProductService $adminProductService
    ) {
        $this->adminProductService = $adminProductService;
    }

    /**
     * Display list products for admin.
     *
     * @return View
     */
    public function index()
    {
        return view(
            'admin-product.index',
            $this->adminProductService->handleIndex()
        );
    }

    /**
     * Display create form.
     *
     * @return View
     */
    public function create()
    {
        return view(
            'admin-product.form',
            $this->adminProductService->handleCreate()
        );
    }

    /**
     * Store a newly created product and images in storage.
     *
     * @param AdminProductStore $request
     * @return RedirectResponse
     */
    public function store(AdminProductStore $request)
    {
        $this->adminProductService->handleStore($request);
        return redirect()->route('admin.index.products');
    }

    /**
     * @param \App\Model\Product $product
     * @return View
     */
    public function show(Product $product)
    {
        return view(
            'admin-product.show',
            $this->adminProductService->handleShow($product)
        );
    }

    /**
     * @param \App\Model\Product $product
     * @return View
     */
    public function edit(Product $product)
    {
        return view(
            'admin-product.form',
            $this->adminProductService->handleEdit($product)
        );
    }

    /**
     * @param AdminProductUpdate $request
     * @param \App\Model\Product $product
     * @return RedirectResponse
     */
    public function update(AdminProductUpdate $request, Product $product)
    {
        $this->adminProductService->handleUpdate($request, $product);
        return redirect()->route('admin.index.products');
    }

    /**
     * @param \App\Model\Product $product
     * @return RedirectResponse
     */
    public function destroy(Product $product)
    {
        $this->adminProductService->handleDestroy($product);
        return redirect()->route('admin.index.products')
            ->withSuccess($product->name . ' ' . __('messages.deleted'));
    }
}
