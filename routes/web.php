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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('dashboard','backend\AdminController@dashboard')->name('dashboard');
Route::post('set-status','backend\AdminController@setStatus')->name('setStatus');

Route::get('/admin/login', 'backend\AdminController@login')->name('adminLogin');
Route::post('/admin/login', 'backend\AdminController@postLogin')->name('postAdminLogin');

Route::group(['middleware' => 'admin','prefix' => 'admin'],function (){

    Route::resources([

        'abouts' => 'backend\AboutController',
        'category' => 'backend\CategoryController',
        'contact' => 'backend\ContactController',
        'main' => 'backend\MainController',
        'social' => 'backend\SocialController',
        'tag' => 'backend\TagController',
        'testimonail' => 'backend\TestimonailsController',
        'user' => 'backend\UserController',

    ]);
});
Route::resources([


    'post' => 'backend\PostController',


]);

