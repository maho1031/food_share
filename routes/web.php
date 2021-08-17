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

// TOP画面
Route::get('/', 'HomeController@index')->name('home');

// 商品一覧
Route::get('/products', 'ProductController@index')->name('products.index');
// 商品一覧(Ajax)
Route::get('/ajax/products', 'Ajax\AjaxController@index')->name('ajaxs.index');

// 商品詳細画面
Route::get('/products/{product_id}/show', 'ProductController@show')->name('products.show');

// Route::get('/', function () {
//     return view('home');
// })->name('login');

Route::group(['middleware' => 'auth'], function() {

    // ユーザーマイページ
    Route::get('/users/show', 'UserController@show')->name('users.show');
    // ユーザー情報編集画面
    Route::get('/users/edit', 'UserController@edit')->name('users.edit');
    // ユーザー情報更新
    Route::post('/users/update', 'UserController@update')->name('users.update');

    // 商品詳細画面
    // Route::get('/products/{product_id}/show', 'ProductController@show')->name('products.show');

    // // コンビニマイページ画面
    // Route::get('/shops/edit', 'ShopController@edit')->name('shops.edit');
    // // コンビニマイページ画面
    // Route::get('/shops/create', 'ShopController@create')->name('shops.create');
    // Route::get('/shops/show', 'ShopController@show')->name('shops.show');

    // Route::get('/shops/productList', 'ShopController@productList')->name('shops.productList');
    // Route::get('/shops/soldList', 'ShopController@soldList')->name('shops.soldList');


    // // 商品新規登録画面
    // Route::get('/products/create', 'ProductController@create')->name('products.create');
    // // 商品編集画面
    // Route::get('/products/edit', 'ProductController@edit')->name('products.edit');
    // // 商品詳細画面
    // Route::get('/products/show', 'ProductController@show')->name('products.show');

});

Auth::routes();



Auth::routes();

// Route::get('/', 'HomeController@index')->name('home');

// コンビニ側
Route::group(['prefix' => 'shop', 'middleware' => 'guest:shop'], function() {
    Route::get('/', function () {
        return view('shop.home');
    });
    // コンビニ側ログイン
    Route::get('login', 'Shop\Auth\LoginController@showLoginForm')->name('shop.login');
    Route::post('login', 'Shop\Auth\LoginController@login')->name('shop.login');

    // コンビニ側新規登録
    Route::get('register', 'Shop\Auth\RegisterController@showRegisterForm')->name('shop.register');
    Route::post('register', 'Shop\Auth\RegisterController@register')->name('shop.register');
    Route::get('password/rest', 'Shop\Auth\ForgotPasswordController@showLinkRequestForm')->name('shop.password.request');

    // 商品詳細画面
    // Route::get('/products/{product_id}/show', 'ProductController@show')->name('products.show');

     

 });

Route::group(['prefix' => 'shop', 'middleware' => 'auth:shop'], function(){
    Route::post('logout', 'Shop\Auth\LoginController@logout')->name('shop.logout');
    Route::get('home', 'Shop\HomeController@index')->name('shop.home');

    // コンビニマイページ
    Route::get('show', 'ShopController@show')->name('shop.show');
    // コンビニプロフィール編集
    Route::get('/shop/edit', 'ShopController@edit')->name('shop.edit');
    // コンビニプロフィール更新
    Route::post('/shop/update', 'ShopController@update')->name('shop.update');

    // 商品新規作成画面
    Route::get('/products/create', 'ProductController@create')->name('products.create');
    // 商品新規作成
     Route::post('/products/store', 'ProductController@store')->name('products.store');
    // 商品編集画面
    Route::get('/products/{product_id}/edit', 'ProductController@edit')->name('products.edit');
    // 商品更新
    Route::post('/products/{product_id}/update', 'ProductController@update')->name('products.update');
    // 商品詳細画面
    Route::get('/products/{product_id}/show', 'ProductController@sshow')->name('products.sshow');
    // 商品削除
    Route::post('/products/{product_id}/destroy', 'ProductController@destroy')->name('products.destroy');
 });