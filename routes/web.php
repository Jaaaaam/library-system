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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'UserController@index')->name('admin');
Route::get('/books', 'BookController@index');
Route::post('/add-book', 'BookController@add');
Route::post('/edit-book', 'BookController@edit');
Route::post('/delete-book', 'BookController@delete');
Route::post('/borrow-book', 'BookController@borrow');
Route::post('/return-book', 'BookController@return');

Route::get('/users', 'UserController@showAll');
Route::post('/add-user', 'UserController@add');
Route::post('/edit-user', 'UserController@edit');
Route::post('/delete-user', 'UserController@delete');