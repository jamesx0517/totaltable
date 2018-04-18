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
Route::get('/clients',['as'=>'clients' ,function() {
    return view('clients');
  }]);
  Route::get('/clients/{id}',function($id) {
      return view('clients', [
          'id' => $id
      ]);
  });

Route::get('/pcrepairs/{id}',function($id) {
    return view('repairs-single', [
        'id' => $id
    ]);
});

Route::get('/it/{id}','PcrepairController@edit');
Route::patch('/it/{id}','PcrepairController@update');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('Pcrepair', 'PcrepairController');
