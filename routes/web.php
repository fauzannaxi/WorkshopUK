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
Route::get('/pendaftaran', 'MahasiswaController@create')->name('pendaftaran');
Route::post('/add', 'MahasiswaController@store')->name('add');
Route::get('/edit/{id}', 'MahasiswaController@edit')->name('edit');
Route::delete('/delete/{id}', 'MahasiswaController@destroy')->name('delete');
Route::patch('/update', 'MahasiswaController@update')->name('update');

