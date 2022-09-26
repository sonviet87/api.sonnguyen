<?php

Route::get('output-warehouses', 'OutputWarehouseController@index');
Route::get('output-warehouses/{id}', 'OutputWarehouseController@show');
Route::post('output-warehouses', 'OutputWarehouseController@store');
Route::put('output-warehouses/{id}', 'OutputWarehouseController@update');
Route::delete('output-warehouses', 'OutputWarehouseController@destroy');


