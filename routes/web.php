<?php

use Illuminate\Support\Facades\Auth;

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
Auth::routes();

// =======================================================
// User認証不要
// =======================================================
// TOP画面
Route::get('/', 'HomeController@index')->name('home');

// 商品一覧
Route::get('/products', 'ProductController@index')->name('products.index');
// 商品一覧(Ajax)
Route::get('/ajax/products', 'Ajax\AjaxController@index');
// 商品検索(Ajax)
Route::post('/ajax/search', 'Ajax\AjaxController@search');


// 商品詳細
Route::get('/products/{product_id}/show', 'ProductController@show')->name('products.show');
// 商品詳細(Ajax)
Route::get('/ajax/productShow', 'Ajax\AjaxController@show');

// =======================================================
// User 認証後
// =======================================================
Route::group(['middleware' => 'auth:user'], function() {
    // ユーザーマイページ
    Route::get('/users/show', 'UserController@show')->name('users.show');
    // ユーザー情報編集画面
    Route::get('/users/edit', 'UserController@edit')->name('users.edit');
    // ユーザー情報更新
    Route::post('/users/update', 'UserController@update')->name('users.update');

    // 商品購入
    Route::post('/product/{product_id}/show/add', 'ProductController@add')->name('products.add');
    // 商品のキャンセル
    Route::post('/product/{product_id}/show/cancel', 'ProductController@cancel')->name('products.cancel');

});

// =======================================================
// Shop 認証不要
// =======================================================
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
    Route::post('password/rest', 'Shop\Auth\ResetPasswordController@reset')->name('shop.password.update');
    Route::post('password/email', 'Shop\Auth\ForgotPasswordController@sendResetLinkEmail')->name('shop.password.email');
    Route::get('password/reset/{token}', 'Shop\Auth\ResetPasswordController@showResetForm')->name('shop.password.reset');

 });

 // =======================================================
// Shop 認証後
// =======================================================
Route::group(['prefix' => 'shop', 'middleware' => 'auth:shop'], function(){
    Route::post('logout', 'Shop\Auth\LoginController@logout')->name('shop.logout');
    Route::get('home', 'Shop\HomeController@index')->name('shop.home');

    // コンビニマイページ
    Route::get('/show', 'Shop\ShopController@show')->name('shop.show');

    // コンビニプロフィール編集
    Route::get('/edit', 'Shop\ShopController@edit')->name('shop.edit');

    // コンビニプロフィール更新
    Route::post('/update', 'Shop\ShopController@update')->name('shop.update');

    // 登録した商品一覧
    Route::get('/productList', 'Shop\ShopController@productList')->name('shop.productList');
    // 登録した商品一覧(Ajax)
    Route::get('/ajax/shopProducts', 'Ajax\AjaxController@shopProducts');

    // 購入された商品一覧
     Route::get('/soldList', 'Shop\ShopController@soldList')->name('shop.soldList');
     // 購入された商品一覧(Ajax)
    Route::get('/ajax/shopSoldProducts', 'Ajax\AjaxController@shopSoldProducts');

    // 商品新規作成画面
    Route::get('/products/create', 'ProductController@create')->name('products.create');
    // 商品新規作成(Ajax)
    Route::post('/ajax/store', 'Ajax\AjaxController@store');

    // 商品編集画面
    Route::get('/products/{product_id}/edit', 'ProductController@edit')->name('products.edit');
    // 商品編集画面(Ajax)
    Route::get('/ajax/edit', 'Ajax\AjaxController@edit');

    // 商品更新(Ajax)
    Route::post('/ajax/update', 'Ajax\AjaxController@update');

    // 商品詳細画面
    Route::get('/products/{product_id}/show', 'ProductController@detail')->name('products.detail');
    // 商品詳細(Ajax)
    Route::get('/ajax/shopProductShow', 'Ajax\AjaxController@detail');

    // 商品削除
    Route::post('/products/{product_id}/destroy', 'ProductController@destroy')->name('products.destroy');
 });