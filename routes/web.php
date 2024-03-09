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
Route::get('/contact','\App\Http\Controllers\MainController@contact')->name('contact.index');

//ADMIN
Route::group(['middleware' => ['auth', 'admin'], 'prefix'=>'/admin'], function (){
    Route::get('/','\App\Http\Controllers\Admin\MainController@index')->name('admin.main.index');

    Route::get('/products/{category}','\App\Http\Controllers\Admin\ProductsController@index')->name('admin.products.index');
    Route::get('/product/create','\App\Http\Controllers\Admin\ProductsController@create')->name('admin.products.create');
    Route::post('/product/create','\App\Http\Controllers\Admin\ProductsController@store')->name('admin.products.store');
    Route::get('/product/{product}/edit','\App\Http\Controllers\Admin\ProductsController@edit')->name('admin.products.edit');
    Route::patch('/product/{product}','\App\Http\Controllers\Admin\ProductsController@update')->name('admin.products.update');
    Route::delete('/product/{product}','\App\Http\Controllers\Admin\ProductsController@delete')->name('admin.products.delete');
});

//USER
Route::group([], function (){
    Route::get('/cart','\App\Http\Controllers\CartController@index')->name('cart.index');
    Route::get('/checkout','\App\Http\Controllers\CartController@checkout')->name('cart.checkout');
    Route::get('/empty-cart','\App\Http\Controllers\CartController@empty_cart')->name('cart.empty');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/fill','\App\Http\Controllers\MainController@fill')->name('fill');
