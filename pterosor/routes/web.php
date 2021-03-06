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

Route::get('/', 'PeopleController@welcome')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('people','PeopleController');

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::resource('users','UsersController');
    Route::resource('people','PeopleController');
});

Route::get('/edit/user','UsersController@edit')->name('auth.editprofile');

Route::post('/upload/user', 'UsersController@update')->name('auth.updateprofile');

