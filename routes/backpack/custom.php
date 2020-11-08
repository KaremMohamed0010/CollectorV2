<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('customer', 'CustomerCrudController');
    Route::crud('user', 'UserCrudController');
    Route::crud('machine', 'MachineCrudController');
    Route::crud('acount', 'AcountCrudController');
    Route::crud('provider', 'ProviderCrudController');
    Route::get('/Addrecive/{id}', 'UserCrudController@CreateRecive');
    Route::post('recive', 'UserCrudController@StoreRecive');

    Route::get('/AddPay/{id}', 'UserCrudController@CreatePay');
    Route::post('Pay', 'UserCrudController@StorePay');





}); // this should be the absolute last line of this file