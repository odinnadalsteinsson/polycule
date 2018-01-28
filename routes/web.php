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

// Facebook authentication
Route::get('auth/facebook', 'Auth\FacebookController@redirectToFacebook');
Route::get('auth/facebook/callback', 'Auth\FacebookController@handleFacebookCallback');

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
