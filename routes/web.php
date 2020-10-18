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
    return view('home');
})->name('home');

Route::get('/alternatif', 'AlternatifController@index')->name('alternatif');
Route::post('/alternatif/tambah', 'AlternatifController@create');

Route::get('/kriteria', 'KriteriaController@index')->name('kriteria');
Route::get('/kriteria/edit/{id}', 'KriteriaController@edit');
Route::put('/kriteria/update/{id}', 'KriteriaController@update');
Route::post('/kriteria/tambah','KriteriaController@tambah');
Route::get('/kriteria/hapus/{id}', 'KriteriaController@hapus');

Route::get('/foo', function () {
    return 'Hello World';
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

