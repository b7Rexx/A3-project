<?php

//admin routes
use Illuminate\Support\Facades\Route;

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

//Guest routes
Route::get('/', 'GuestController@home')->name('guest-home');
Route::get('/login/{type?}/{id?}', 'GuestController@login')->name('login-home');


//shop routes
Route::group(['prefix' => 'shop'], function () {
    Route::post('/login', 'GuestController@shopLogin')->name('shop-login');
});


//user routes
Route::group(['prefix' => 'user'], function () {
    Route::post('/login', 'GuestController@userLogin')->name('user-login');
});


//VUE API ROUTES
Route::group(['prefix' => 'api'], function () {
    Route::post('register', 'ApiController@registerFirst');
    Route::post('registerSecond', 'ApiController@registerSecond');
});
