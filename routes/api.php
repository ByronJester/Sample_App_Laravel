<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); 

#Account Management
Route::post('/register', 'AxiosCall\AccountsManagement@registerAccount');
Route::post('/login', 'AxiosCall\AccountsManagement@loginAccount');

#Profile Management
Route::resource('/profile', 'AxiosCall\ProfileManagement');

#Newsfeed Post Management
Route::get('/post', 'AxiosCall\HomepageManagement@index');
Route::post('/post', 'AxiosCall\HomepageManagement@store');
Route::delete('/post/{id}', 'AxiosCall\HomepageManagement@delete');
Route::patch('/post/{id}', 'AxiosCall\HomepageManagement@update');
#Like Post Management
Route::post('/like','AxiosCall\HomepageManagement@like');
