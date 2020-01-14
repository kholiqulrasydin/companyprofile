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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'FrontendController@index')->name('welcome');

Auth::routes();

/*This Is Position Routes*/
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/position', 'PositionController@index')->name('position');
Route::get('/position/add', 'PositionController@create')->name('addPosition');
Route::post('/position/add', 'PositionController@store')->name('position.store');
Route::get('/position/edit/{id}', 'PositionController@edit')->name('position.edit');
Route::put('/position/update/{id}', 'PositionController@update')->name('position.update');
Route::get('/position/delete/{id}', 'PositionController@delete')->name('position.delete');
//Route::resource('position', 'PositionController');

/* End Of Position Routes*/

/*This Is User Routes*/

Route::get('/user', 'UserController@index')->name('user');
Route::get('/user/add', 'UserController@add')->name('user.add');
Route::post('/user/add/create', 'UserController@create')->name('user.create');
Route::get('/user/delete/{id}', 'UserController@delete')->name('user.delete');

/* End Of User Routes*/
