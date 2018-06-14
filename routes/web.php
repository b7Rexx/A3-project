<?php

use App\Category;
use Illuminate\Support\Facades\Route;

//Backend routes
Route::group(['prefix' => '@dmin'], function () {
    Route::get('/', 'AdminController@index')->name('admin-index');
    Route::get('/home', 'AdminController@home')->name('admin-home');

    //carousel add & remove
    Route::get('/carousel', 'AdminController@carousel')->name('admin-carousel');
    Route::post('/carousel', 'AdminController@carouselAction')->name('carousel-action');

    Route::post('/home', 'AdminController@homeAction')->name('admin-action');
    Route::get('/View', 'AdminController@view')->name('admin-view');
    Route::get('/View/delete', 'AdminController@viewDelete')->name('admin-delete');
    Route::get('/test', 'AdminController@test')->name('admin-test');
    Route::get('/Shop', 'AdminController@adminView')->name('admin-shop-view');
});

//Frontend home routes
Route::get('/', 'HomeController@index')->name('home');
Route::get('/list/shop', 'HomeController@shopList')->name('shop-list');
Route::get('/list/user', 'HomeController@userList')->name('user-list');


//Shop routes
Route::group(['prefix' => 'shop'], function () {

    Route::get('/signup/{route?}/{id?}', 'ShopController@signup')->name('login');
    Route::post('/signup/register', 'ShopController@register');
    Route::post('/signup/registerSecond', 'ShopController@registerSecond');
    Route::post('api/login', 'ShopController@loginAction')->name('shop-login-action');
    Route::get('/id/{id}', 'ShopController@profile')->where(['id' => '[0-9]+']);

    Route::group(['middleware' => 'auth:shop'], function () {
        Route::get('/', 'ShopController@LoggedProfile')->name('shop-profile');
        Route::get('/items/{route?}', 'ShopController@shopItems')->name('shop-items');
        Route::post('/id/image', 'ShopController@profileImageUpload')->name('shop-profile-image-upload');
        Route::post('item/addItem', 'ShopController@addItem');
        Route::post('item/addImage', 'ShopController@addImage');

        Route::get('/itemShopList', 'ShopController@itemShopList');

        Route::get('/logout', 'ShopController@logout')->name('shop-logout');
    });
});

//user routes
Route::group(['prefix' => 'user'], function () {
    Route::get('/signup/{route?}/{id?}', 'UserController@signup')->name('user-signup');
    Route::post('/signup/register', 'UserController@register');
    Route::post('/signup/registerSecond', 'UserController@registerSecond');
    Route::post('api/login', 'UserController@loginAction');
    Route::get('/id/{id}', 'UserController@profile')->where(['id' => '[0-9]+']);

    Route::group(['middleware' => 'auth:user'], function () {

        Route::post('/id/image', 'UserController@profileImageUpload');
        Route::get('/', 'UserController@LoggedProfile')->name('user-profile');
        Route::post('/api/rate', 'UserController@rate');
        Route::post('post','UserController@post')->name('post-user');

        Route::get('/logout', 'UserController@logout');
    });
});


//item routes
Route::group(['prefix' => 'item'], function () {
    Route::get('browse', 'ItemController@browse')->name('browse-item');
});


//api
Route::get('api/categoryList', function () {
    return response(Category::all());
});