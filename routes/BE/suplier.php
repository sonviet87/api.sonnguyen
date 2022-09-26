<?php

Route::get('supliers', 'SuplierController@index');
Route::get('supliers/{id}', 'SuplierController@show');
Route::post('supliers', 'SuplierController@store');
Route::put('supliers/{id}', 'SuplierController@update');
Route::delete('supliers', 'SuplierController@destroy');


