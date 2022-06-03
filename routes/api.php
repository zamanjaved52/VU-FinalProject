<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::group(['namespace'=>'api'],function() {
    Route::post('register', 'UserController@register');
    Route::post('login', 'UserController@login');
    Route::get('user_profile/{user}', 'UserController@profile');
    Route::post('update_profile/', 'UserController@updateProfile');
    Route::post('forgot_password', 'UserController@forgotPassword');
    Route::get('search/{name}', 'UserController@searchdata');

});
