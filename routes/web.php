<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', 'HomeController@index')->name('home');
Route::get('/legal', 'HomeController@legal')->name('legal');
Route::get('/devlog', 'HomeController@devlog')->name('devlog');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/myannonces', 'UserController@myannonces')->name('myannonces');
Route::get('/user/annonces', 'UserController@annonces')->name('user.annonces');
Route::get('/user/users', 'UserController@users')->name('user.users');
Route::get('/become_advertiser', 'HomeController@become_advertiser')
    ->name('become_advertiser')
    ->middleware('auth')
    ->middleware('account_created');

Route::resource('regions', 'RegionController');
Route::resource('departements', 'DepartementController');
Route::resource('user', 'UserController');
Route::resource('account', 'AccountController');
Route::resource('annonces', 'AnnonceController');

Route::get('annonces/create/{id}', 'AnnonceController@create')->name('annonces.create');
Route::get('image/fetch_image/{id}', 'ImageController@fetch_image')->name('image.fetch');

Route::get('/confirm/{id}', 'AnnonceController@confirm_paiement')->name('confirm');
Route::post('/annonces/search', 'AnnonceController@search')->name('annonces.search');
Route::post('/users/search', 'UserController@search')->name('users.search');

Route::post('/config/update', 'ConfigController@store')->name('config.store');
Route::get('/pay/{id}', 'AnnonceController@pay')->name('annonce.pay');

Route::post('setAdmin/{id}', 'UserController@setAdmin')->name('setAdmin');
Route::post('removeAdmin/{id}', 'UserController@removeAdmin')->name('removeAdmin');

Route::get('passwordEdit/{id}', 'UserController@passwordEdit')->name('passwordEdit');
Route::post('passwordChange/{id}', 'UserController@passwordChange')->name('passwordChange');
Route::post('passwordReset/{id}', 'UserController@passwordReset')->name('passwordReset');
