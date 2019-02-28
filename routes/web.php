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
    if (\Auth::user() ) {
        return redirect ('/home');
    } else {
        return view('welcome');
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/profile', 'WebControllers\UserController@profile')->name('profile')->middleware('auth');

Route::get('/profile/avatar', [
     'as'         => 'profile.show_avatar',
     'uses'       => 'WebControllers\UserController@show_avatar',
     'middleware' => 'auth',
]);

Route::post('profile/save', 'WebControllers\UserController@save')->name('profile-Save')->middleware('auth');