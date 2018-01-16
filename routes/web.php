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

Route::get('/', function () {return view('welcome');})->name('home');

/*用户路由*/
Route::resource('users', 'UsersController');

/*注册界面*/
Route::get('register', 'UsersController@create')->name('register');

/*登录界面*/
Route::get('login', 'SessionsController@create')->name('login');

/*创建新会话*/
Route::post('login', 'SessionsController@store')->name('login');

/*销毁会话*/
Route::get('logout', 'SessionsController@destroy')->name('logout');

/*资源路由*/
Route::resource('resources', 'ResourcesController');

/*书籍路由*/
Route::resource('books', 'BooksController');

/*Create QRcode and zip file*/
Route::post('qrcode/create','QrcodesController@create');

/*Mobile view*/
Route::resource('book', 'BookContoller');