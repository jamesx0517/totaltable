<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/pcrepairs', 'PcrepairController@index');

Route::get('/pcrepairs/{id}', 'PcrepairController@show');

Route::get('/select/{id}', 'PcrepairController@it');

Route::post('/pcrepairs', 'PcrepairController@store');

Route::get('/userregister', 'DepartmentController@index');
