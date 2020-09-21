<?php 
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' =>  \App\Http\Middleware\CheckLocale::getLocalePrefix(),
    'middleware' => 'CheckLocale'
    ], function () {
    Route::get('/', 'Main@index');
});
