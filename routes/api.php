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
Route::post('/profile', 'AxiosCall\ProfileManagement@setupProfile');

 