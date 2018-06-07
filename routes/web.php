<?php
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
Route::get('/','HomeController@index')->name('home');