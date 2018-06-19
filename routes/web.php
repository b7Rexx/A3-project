<?php

use App\Category;
use App\Item;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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
Route::get('/list/post', 'HomeController@postList')->name('post-list');
Route::get('cart/view', 'HomeController@cartView');

//Shop routes
Route::group(['prefix' => 'shop'], function () {

    Route::get('/signup/{route?}/{id?}', 'ShopController@signup')->name('login');
    Route::post('/signup/register', 'ShopController@register');
    Route::post('/signup/registerSecond', 'ShopController@registerSecond');
    Route::post('api/login', 'ShopController@loginAction')->name('shop-login-action');
    Route::get('/id/{id}', 'ShopController@profile')->where(['id' => '[0-9]+']);

    Route::group(['middleware' => 'auth:shop'], function () {
        Route::get('/', 'ShopController@LoggedProfile')->name('shop-profile');
        Route::post('/id/image', 'ShopController@profileImageUpload')->name('shop-profile-image-upload');

        Route::get('/action/{route?}', 'ShopController@LoggedProfile');

        Route::post('/action/update', 'ShopController@updateItem');
        Route::post('/action/delete', 'ShopController@deleteItem');

        Route::post('item/addItem', 'ShopController@addItem');
        Route::post('item/addImage', 'ShopController@addImage');

        Route::get('/itemShopList', 'ShopController@itemShopList');

        Route::get('setting', 'ShopController@getsetting');
        Route::post('setting', 'ShopController@postsetting');
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
        Route::post('post', 'UserController@post')->name('post-user');

        Route::post('/comment/add', 'UserController@commentAdd');

        Route::get('setting', 'UserController@getsetting');
        Route::post('setting', 'UserController@postsetting');
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

Route::get('api/shop/item/{id}', function ($id) {
    return response(Item::find($id));
});

Route::post('api/store/cart', 'HomeController@cartManager');

Route::get('api/get/cartItem', function () {
    $data = Session::get('cartList');
    if (empty($data)) return response(['status' => false]);
    $items = [];
    $i=0;
    foreach ($data as $id) {
        $item = Item::find($id);
        if (!in_array($item, $items)) {
            $items[$i++] = $item;
        }
    }
    return response($items);
});