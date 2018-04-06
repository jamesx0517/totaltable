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

Route::get('/pcrepairs',['as'=>'form' ,function() {
    return view('form');  //將入route命名
}]);

Route::get('/pcrepairs/{id}', function($id) {
    return view('repairs-single', [
        'id' => $id
    ]);
});

Route::get('/it/{id}', function($id) {
    return view('case ', [
        'id' => $id
    ]);
});
Route::patch('/it/{id}','PcrepairController@itEdit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('Pcrepair', 'PcrepairController');
