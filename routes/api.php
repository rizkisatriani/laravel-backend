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

Route::middleware('auth:api')->get('/level', function (Request $request) {
    return $request->user();
}); 


Route::get('/showresto', 'PoiRestoController@Index');
Route::post('/storeresto', 'PoiRestoController@store');
Route::post('/updateresto', 'PoiRestoController@update'); 
Route::post('/deleteresto', 'PoiRestoController@destroy'); 	

Route::get('/get-sub-ruang-guru', 'SubscriptionController@Index');
Route::post('/add-sub', 'SubscriptionController@store');
Route::post('/edit-sub', 'SubscriptionController@edit');
 
