<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/singleblog/{id}','WelcomeController@singleblog')->name('singleblog');

Route::get('/home', 'HomeController@index')->name('home');

// FrontEnd

Route::get('/user/blog','Frontend\UserController@index')->name('user'); 
Route::resource('user/blogs','Frontend\BlogController');
Route::resource('user/comment','Frontend\CommentController');


// Backend Route

Route::get('/admin','Backend\AdminController@index')->name('admin');
Route::resource('admin/profile','Backend\ProfileController');

Route::resource('admin/user','Backend\UserController');
Route::resource('admin/blog','Backend\BlogController');