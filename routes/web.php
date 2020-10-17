<?php

use Illuminate\Support\Facades\Route;

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
Route::get('admin', function(){
    return 'Hello Kamu adalah admin';
})->name('editor');
Route::get('editor', function(){
    return 'Hello Kamu adalah editor';
})->name('editor');

Route::get('cuties/detail/{id}','CutiController@detail')->name('cuties.detail');
Route::get('cuties/filter','CutiController@filter')->name('cuties.filter');
Route::resource('cuties', 'CutiController');
Route::get('/user/index', 'UserController@index')->name('account.index');
Route::get('/user/create', 'UserController@create');
Route::post('/user/store', 'UserController@store');

