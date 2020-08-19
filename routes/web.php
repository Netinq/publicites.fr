<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', 'HomeController@index')->name('home');
Route::get('/legal', 'HomeController@legal')->name('legal');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/become_advertiser', 'HomeController@become_advertiser')
    ->name('become_advertiser')
    ->middleware('auth');;
    
Route::resource('regions', 'RegionController');
Route::resource('departements', 'DepartementController');
Route::resource('user', 'UserController');
Route::resource('account', 'AccountController');
Route::resource('annonces', 'AnnonceController');
Route::resource('file', 'FileController');

Route::get('annonces/create/{id}', 'AnnonceController@create')->name('annonces.create');
Route::get('image/fetch_image/{id}', 'ImageController@fetch_image')->name('image.fetch');

Route::get('paypal', function () {
    return view('test');
});

Route::get('/confirm/{id}', 'AnnonceController@confirm_paiement')->name('confirm');