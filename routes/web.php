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

Auth::routes();
Route::get('/', function(){
    return redirect()->route('admin.index');
});
Route::get('/login', 'HomeController@login')->name('login');
Route::post('login', 'HomeController@postLogin')->name('login.post');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    route::get('/', 'AdminController@index')->name('admin.index');
});

