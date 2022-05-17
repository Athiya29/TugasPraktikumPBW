<?php

use Illuminate\Support\Facades\Route;
use Http\Controllers\databukuController;
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

Route::get('/test', function () {
    return view('test');
});

Route::get('/', function () {
    return view('home');
});


Route::get('/tampildata', 'databukuController@readdata');
Route::get('/tambahdata','databukuController@input');
Route::post('/databuku/store', 'databukuController@store');

Route::get('/databuku/edit/{id_buku}', 'databukuController@edit');
Route::post('/databuku/update', 'databukuController@update');
Route::get('/databuku/hapus/{id_buku}', 'databukuController@hapus');

