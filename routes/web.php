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

Route::group(['middleware' => 'revalidate'], function(){
	#Login Page
	Route::get('/', 'WebView\AccountsManagement@login');
	Route::get('/index', 'WebView\AccountsManagement@login');
	Route::get('/login', 'WebView\AccountsManagement@index');

	#Home Page
	Route::get('/home', 'WebView\HomepageManagement@home');
	Route::get('/users', 'WebView\HomepageManagement@index');

	#User Profile
	Route::get('/profile', 'WebView\ProfileManagement@index');

	#Log out
	Route::get('/logout', 'WebView\AccountsManagement@logout');
});

