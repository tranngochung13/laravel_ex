<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('index', function () {
    return view('admin.index');
});

Route::get('button', function () {
    return view('admin.button');
});

Route::get('animations', function () {
    return view('admin.animations');
});

Route::get('borders', function () {
    return view('admin.borders');
});

Route::get('cards', function () {
    return view('admin.cards');
});

Route::get('charts', function () {
    return view('admin.charts');
});

Route::get('colors', function () {
    return view('admin.colors');
});

Route::get('other', function () {
    return view('admin.other');
});

Route::get('tables', function () {
    return view('admin.tables');
});

Route::get('404', function () {
    return view('admin.404page');
});

Route::get('blank', function () {
    return view('admin.blankPage');
});

Route::get('forgotPassword', function () {
    return view('admin.forgotPassword');
});

Route::get('login', function () {
    return view('admin.login');
});

Route::get('register', function () {
    return view('admin.register');
});

Route::get('demo', [
    'as'=>'demo',
    'uses'=>'PageController@getSlide'
]);

Route::get('trangchu', [
	'as'=>'trang-chu',
	'uses'=>'PageController@getIndex'
]);


Route::get('loaisanpham/{type}', [
        'as'    => 'loaisanpham',
        'uses'  => 'PageController@getLoaiSp'
    ]);

Route::get('chitietsanpham/{id}', [
        'as'    => 'chitietsanpham',
        'uses'  => 'PageController@getChitietSp'
    ]);

Route::get('add-to-cart/{id}', [
        'as'    => 'AddtoCart',
        'uses'  => 'PageController@getAddtoCart'
    ]);

Route::get('Delete-Item-Cart/{id}', [
        'as'    => 'DeleteItemCart',
        'uses'  => 'PageController@getDeleteItemCart'
    ]);

Route::get('Dat-hang', [
        'as'    => 'DatHang',
        'uses'  => 'PageController@getCheckout'
    ]);

Route::post('Dat-hang1', [
        'as'    => 'DatHang1',
        'uses'  => 'PageController@postCheckout'
    ]);

Route::get('chitiet', [
	'as'=>'Chi-tiet',
	'uses'=>'PageController@getChitiet'
]);

Route::get('lienhe', [
	'as'=>'Lien-he',
	'uses'=>'PageController@getLienhe'
]);

Route::get('about', [
	'as'=>'about',
	'uses'=>'PageController@getAbout'
]);

Route::get('a', function () {
    return view('blog.create');
});

Route::resource('blog', 'ProductsController');
//Route::resource('product', 'ProductController');


Route::get('product','productController@index');

Route::post('product/upload', 'productController@upload');
