<?php
/*
|--------------------------------------------------------------------------
| Example Actions Handled By Resource Controller
|--------------------------------------------------------------------------
|   GET         /products                   index      products.index
|   GET         /products/create            create     products.create
|   POST        /products                   store      products.store
|   GET         /products/{product}         show       products.show
|   GET         /products/{product}/edit    edit       products.edit
|   PUT/PATCH   /products/{product}         update     products.update
|   DELETE      /products/{product}         destroy    products.destroy
|
 */

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => \App\Http\Middleware\CheckLocale::getLocalePrefix(),
    'middleware' => 'CheckLocale',
], function () {

    Route::resource('/admin/products', AdminProductsController::class);

    Route::resource('/admin/products', AdminProductsController::class)->names([
        'index' => 'admin.index.products',
        'create' => 'admin.create.product',
        'store' => 'admin.create.product.post',
        'show' => 'admin.show.product',
        'edit' => 'admin.edit.product',
        'update' => 'admin.update.product',
        'destroy' => 'admin.destroy.product',
    ]);
});
