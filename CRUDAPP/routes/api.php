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

Route::middleware('api')->get('/user', function (Request $request) {
    return $request->user();
});

// List Users
Route::get('users', 'UsersController@index');

// List 1 User
Route::get('user/{id}', 'UsersController@show');

//Create new User
Route::post('users', 'UsersController@store');

//Update
Route::put('user', 'UsersController@store');

//Delete user

Route::delete('user/{id}', 'UsersController@destroy');