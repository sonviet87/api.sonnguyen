<?php

Route::get('input-warehouses', 'InputWarehouseController@index');
Route::get('input-warehouses/{id}', 'InputWarehouseController@show');
Route::post('input-warehouses', 'InputWarehouseController@store');
Route::put('input-warehouses/{id}', 'InputWarehouseController@update');
Route::delete('input-warehouses', 'InputWarehouseController@destroy');


