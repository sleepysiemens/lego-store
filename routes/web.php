<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {return view('welcome');});

Route::get('/','\App\Http\Controllers\MainController@index')->name('main.index');
Route::get('/shop','\App\Http\Controllers\ShopController@index')->name('shop.index');
Route::get('/shop/{product}','\App\Http\Controllers\ShopController@show')->name('shop.show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/fill','\App\Http\Controllers\MainController@fill')->name('fill');
