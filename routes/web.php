<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => App\Http\Middleware\CheckLocale::getLocale()], function(){
    Route::get('/', 'Main@index');
});
