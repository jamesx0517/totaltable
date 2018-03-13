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

Route::get('/pcrepairs', function() {
    return view('form');
});

Route::get('/pcrepairs/{id}', function($id) {
    return view('repairs-single', [
        'id' => $id
    ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
