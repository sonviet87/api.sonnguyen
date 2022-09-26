<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

foreach (glob(__DIR__ . '/FE/*.php') as $filename) {
    require_once $filename;
}

Route::group(['middleware' => ['auth:api']], function(){
    foreach (glob(__DIR__ . '/BE/*.php') as $filename) {
        require_once $filename;
    }
});
Route::get('clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    return 'Application cache cleared';
});





