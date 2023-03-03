<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/create', 'CreateUserController@createUser');
Route::get('/get-all-user', 'CreateUserController@getAllUser');
Route::get('/get-one-user/{id}', 'CreateUserController@getOneUser');
Route::post('/update-user/{id}', 'CreateUserController@updateUser');
Route::delete('/delete-user/{id}', 'CreateUserController@deleteUser');
Route::get('/search-user', 'CreateUserController@searchUser');
Route::get('/get-page', 'CreateUserController@getPage');
