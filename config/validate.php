<?php

return [
    /*
    |--------------------------------------------------------------------------
    | validation conf
    |--------------------------------------------------------------------------
    |
    | Here you may configure the validation fields
    |
    */

    'products' => [
        'image' => 'mimes:jpeg,png,jpg|max:2048',
    ],

];
