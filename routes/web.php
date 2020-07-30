<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', 'HomeController@index')->name('home');
Route::get('/legal', 'HomeController@legal')->name('legal');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('user', 'UserController');
Route::resource('account', 'AccountController');