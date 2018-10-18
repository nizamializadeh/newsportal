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

Route::post('set-status','backend\AdminController@setStatus')->name('setStatus');

Route::get('/admin/login', 'backend\AdminController@login')->name('adminLogin');
Route::post('/admin/login', 'backend\AdminController@postLogin')->name('postAdminLogin');

Route::get('/s','frontend\SiteController@index')->name('site');
Route::get('/abouts','frontend\SiteController@about')->name('about');
Route::get('/testimonail','frontend\SiteController@testimonail')->name('testimonail');
Route::get('/contact','frontend\SiteController@contact')->name('contact');
Route::post('/contactus','frontend\SiteController@contactus')->name('contactus');

Route::group(['middleware' => 'admin','prefix' => 'admin'],function (){
    Route::get('dashboard','backend\AdminController@dashboard')->name('dashboard');
    Route::get('contact-us','backend\AdminController@contactus')->name('contactus');

    Route::resources([

        'abouts' => 'backend\AboutController',
        'category' => 'backend\CategoryController',
        'contact' => 'backend\ContactController',
        'main' => 'backend\MainController',
        'social' => 'backend\SocialController',
        'tag' => 'backend\TagController',
        'testimonail' => 'backend\TestimonailsController',
        'user' => 'backend\UserController',
        'image' => 'backend\ImageController',

    ]);
});

Route::resources([
    'post' => 'backend\PostController',
]);
Route::get('/profil/edit','backend\UserController@edit')->name('edit');
Route::post('/profil/update','backend\UserController@update')->name('update');


