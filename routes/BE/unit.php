<?php

Route::get('units', 'UnitController@index');
Route::get('units/{id}', 'UnitController@show');
Route::post('units', 'UnitController@store');
Route::put('units/{id}', 'UnitController@update');
Route::delete('units', 'UnitController@destroy');


