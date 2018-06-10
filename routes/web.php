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
Route::get('/signup/{route?}/{id?}', 'HomeController@signup')->name('login');
Route::post('/signup/register', 'HomeController@register');
Route::post('/signup/registerSecond', 'HomeController@registerSecond');
Route::get('/list/shop', 'HomeController@shopList')->name('shop-list');


//Shop routes
Route::post('api/shop/login', 'ShopController@loginAction')->name('shop-login-action');
Route::get('/shop/logout','ShopController@logout')->name('shop-logout');

Route::group(['prefix' => 'shop', 'middleware' => 'auth:shop'], function () {
    Route::get('/id/{id}', 'ShopController@profile')->where(['id' => '[0-9]+']);
    Route::get('/', 'ShopController@LoggedProfile')->name('shop-profile');
    Route::get('/items/{route?}', 'ShopController@shopItems')->name('shop-items');
    Route::post('/id/image', 'ShopController@profileImageUpload')->name('shop-profile-image-upload');
    Route::post('item/addItem', 'ShopController@addItem');
    Route::get('/itemShopList', 'ShopController@itemShopList');

});


//api
Route::get('api/categoryList', function () {
    return response(Category::all());
});