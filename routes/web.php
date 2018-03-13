<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/application', function () {
    return view('application');
});

Route::get('/pcrepairs', 'PcrepairController@index');
Route::get('/pcrepairs/{id}', 'PcrepairController@show');
Route::post('/pcrepairs', 'PcrepairController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
