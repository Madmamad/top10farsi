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
Route::get('/hi', 'HomeController@index');


Route::get('/list/new', 'Top10Controller@create');
Route::post('/list/new', 'Top10Controller@store');

Route::get('/list/{id}', 'Top10Controller@show');

Route::post('/list/comment','CommentController@store');

Route::get('/item/new/{id}', 'ItemController@create');
Route::post('/item/new/{id}', 'ItemController@store');

Route::post('/vote', 'ItemController@actOnVote');
Route::post('/like','CommentController@actonlike');
Route::post('/comment/delete','CommentController@delete');

Auth::routes();
// $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
//    $this->post('login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
//profile
Route::get('/user/profile', 'ProfileController@show');
Route::post('/user/edit', 'ProfileController@edit');
//
//    // Registration Routes...
//    $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//    $this->post('register', 'Auth\RegisterController@register');
//    // Password Reset Routes...
//    $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//    $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//    $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//    $this->post('password/reset', 'Auth\ResetPasswordController@reset');


Route::get('/home', 'HomeController@index')->name('home');
