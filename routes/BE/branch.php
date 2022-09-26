<?php

Route::get('branches', 'BranchController@index');
Route::get('branches/{id}', 'BranchController@show');
Route::post('branches', 'BranchController@store');
Route::put('branches/{id}', 'BranchController@update');
Route::delete('branches', 'BranchController@destroy');


