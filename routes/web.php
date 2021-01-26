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


Auth::routes(['register'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('category', 'App\Http\Controllers\CategoryController')->middleware('auth');
Route::resource('band', 'App\Http\Controllers\BandController')->middleware('auth');

Route::get('/', 'App\Http\Controllers\BandController@listBand');

Route::get('/bands/{id}', 'App\Http\Controllers\BandController@view')->name('band.view');