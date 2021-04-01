<?php

Route::group([
    'prefix' => 'v1',
    'namespace' => 'Api'
], function () {
    Route::get('/my-orders', 'Auth\OrderTenantController@index')->middleware(['auth']);
    Route::patch('/my-orders', 'Auth\OrderTenantController@update')->middleware(['auth']);
});