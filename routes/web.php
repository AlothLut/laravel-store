<?php
/*
|--------------------------------------------------------------------------
| Actions Handled By Resource Controller
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

    Route::resource('/admin/product', AdminProductsController::class);

    // Route::get('/catalog/{category}/{product-code}', 'CategoriesController@index')
    //     ->name('categories.show');

    // Route::get('/catalog/create', 'ProductsController@create')
    //     ->name('create.product');

    // Route::post('/catalog/create', 'ProductsController@store')
    //     ->name('create.product.post');

    // Route::get('/catalog/{product-code}', 'ProductsController@showDetail')
    //     ->name('showDetail.product');

    Route::resource('/admin/product', AdminProductsController::class)->names([
        'create' => 'create.product',
        'store' => 'create.product.post'
    ]);
});
