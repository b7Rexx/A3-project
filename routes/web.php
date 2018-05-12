<?php

use Illuminate\Support\Facades\Route;

//admin routes
Route::group(['prefix' => '@dmin'], function () {
    Route::get('/', 'AdminController@index')->name('admin-index');
    Route::get('/home', 'AdminController@home')->name('admin-home');
    Route::post('/home', 'AdminController@homeAction')->name('admin-action');
    Route::get('/View', 'AdminController@view')->name('admin-view');
    Route::get('/View/delete', 'AdminController@viewDelete')->name('admin-delete');
    Route::get('/test', 'AdminController@test')->name('admin-test');
    Route::get('/Shop', 'AdminController@adminView')->name('admin-shop-view');
});

//homepage routes
Route::group(['middleware' => 'auth:shop'], function () {
    Route::get('/', 'mainController@index')->name('home-index');
});


//Login/Register routes
Route::group(['prefix' => 'login'], function () {
    Route::get('/', 'mainController@login')->name('login');
    Route::post('/', 'mainController@loginAction')->name('login-action');
    Route::get('/register', 'mainController@register')->name('register');
    Route::post('/register', 'mainController@registerAction')->name('register-action');
    Route::get('logout','mainController@logout')->name('logout');
});


//shop routes
Route::group(['prefix' => 'shop'], function () {
    //shop admin section
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', 'shopController@home')->name('shop-admin-home');
    });

    //shop frontend section
    Route::group([], function () {

    });
});


//user routes
Route::group(['prefix' => 'user'], function () {

});