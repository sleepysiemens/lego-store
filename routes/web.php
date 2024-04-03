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

    Route::get('/orders','\App\Http\Controllers\Admin\OrdersController@index')->name('admin.orders.index');
    Route::get('/order/{number}','\App\Http\Controllers\Admin\OrdersController@show')->name('admin.orders.show');
    Route::get('/order/{number}/edit','\App\Http\Controllers\Admin\OrdersController@edit')->name('admin.orders.edit');
    Route::patch('/order/{order}','\App\Http\Controllers\Admin\OrdersController@update')->name('admin.orders.update');

    Route::patch('/update_cities','\App\Http\Controllers\Admin\MainController@update_cities')->name('admin.update_cities');

});

//USER
Route::group([], function (){
    Route::get('/cart','\App\Http\Controllers\CartController@index')->name('cart.index');
    Route::post('/check','\App\Http\Controllers\CartController@check')->name('cart.check');
    Route::get('/checkout','\App\Http\Controllers\CartController@checkout')->name('cart.checkout');
    Route::get('/empty-cart','\App\Http\Controllers\CartController@empty_cart')->name('cart.empty');
});

Route::group(['middleware'=>'auth'], function (){
    Route::get('/profile','\App\Http\Controllers\ProfileController@index')->name('profile.index');
    Route::get('/order/{number}','\App\Http\Controllers\OrderController@index')->name('order.index');


    Route::post('/create_order','\App\Http\Controllers\OrderController@create')->name('order.create');
    Route::get('/successful_payment','\App\Http\Controllers\OrderController@successful_payment')->name('successful_payment');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LogoutController@index')->name('logout.get');


Route::get('/test', '\App\Http\Controllers\TestController@index')->name('test');
