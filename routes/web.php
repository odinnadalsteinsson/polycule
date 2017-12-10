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

// Registration and login
Auth::routes();

// Facebook login
Route::get('login/facebook', 'Auth\LoginController@redirectToFacebook');
Route::get('login/facebook/callback', 'Auth\LoginController@handleFacebookCallback');

// Facebook register
Route::get('register/facebook', 'Auth\RegisterController@redirectToFacebook');
Route::get('register/facebook/callback', 'Auth\RegisterController@handleFacebookCallback');

// Front page
Route::get('/', function () {
    return view('welcome');
});

// Photo uploads
Route::post('home/photo', 'HomeController@postPhoto');
Route::get('home', 'HomeController@index')->name('home');

// Import from mailchimp
Route::get('users/import', 'UserController@import');

// Define resource routes
Route::resources([
    'users' => 'UserController',
]);
