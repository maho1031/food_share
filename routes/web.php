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

// Route::get('/', 'HomeController@index')->name('home');

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// 商品一覧
Route::get('/products', 'ProductController@index')->name('products.index');

// Route::get('/', function () {
//     return view('home');
// })->name('login');

// Route::group(['middleware' => 'auth'], function() {

    // ユーザーマイページ画面
    Route::get('/users', 'UserController@index')->name('user.index');
    // ユーザー情報画面
    Route::get('/users/show', 'UserController@show')->name('users.show');
    // ユーザー情報編集画面
    Route::get('/users/edit', 'UserController@edit')->name('users.edit');

    // コンビニマイページ画面
    Route::get('/shops/edit', 'ShopController@edit')->name('shops.edit');
    // コンビニマイページ画面
    Route::get('/shops/create', 'ShopController@create')->name('shops.create');
    Route::get('/shops/show', 'ShopController@show')->name('shops.show');

    Route::get('/shops/productList', 'ShopController@productList')->name('shops.productList');
    Route::get('/shops/soldList', 'ShopController@soldList')->name('shops.soldList');


    // 商品新規登録画面
    Route::get('/products/create', 'ProductController@create')->name('products.create');
    // 商品編集画面
    Route::get('/products/edit', 'ProductController@edit')->name('products.edit');
    // 商品詳細画面
    Route::get('/products/show', 'ProductController@show')->name('products.show');

// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

// コンビニ側
Route::group(['prefix' => 'shop', 'middleware' => 'guest:shop'], function() {
    Route::get('/', function () {
        return view('admin.home');
    });
    Route::get('login', 'Shop\Auth\LoginController@showLoginForm')->name('shop.login');
    Route::post('login', 'Admin\Auth\LoginController@login')->name('shop.login');

    Route::get('register', 'Shop\Auth\RegisterController@showRegisterForm')->name('shop.register');
    Route::post('register', 'Shop\Auth\RegisterController@register')->name('shop.register');

    Route::get('password/rest', 'Shop\Auth\ForgotPasswordController@showLinkRequestForm')->name('shop.password.request');


 });

Route::group(['prefix' => 'shop', 'middleware' => 'auth:shop'], function(){
    Route::post('logout', 'Shop\Auth\LoginController@logout')->name('shop.logout');
    Route::get('home', 'Shop\HomeController@index')->name('shop.home');
 });