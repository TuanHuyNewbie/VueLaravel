<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('/create', 'CreateUserController@createUser');
// Route::get('/get-all-user', 'CreateUserController@getAllUser');
// Route::get('/get-one-user/{id}', 'CreateUserController@getOneUser');
// Route::post('/update-user/{id}', 'CreateUserController@updateUser');
// Route::delete('/delete-user/{id}', 'CreateUserController@deleteUser');
// Route::get('/search-user', 'CreateUserController@searchUser');
// Route::get('/get-page', 'CreateUserController@getPage');

/*-------------------------------------------
___________________User______________________
---------------------------------------------*/

Route::post('/create-user', 'UserController@createUser');
Route::get('/get-all-user', 'UserController@getAllUser');
Route::get('/get-one-user/{id}', 'UserController@getOneUser');
Route::put('/update-user/{id}', 'UserController@updateUser');
Route::delete('/delete-user/{id}', 'UserController@deleteUser');
Route::get('/search-user', 'UserController@searchUser');

/*-------------------------------------------
___________________Khu Vuc___________________
---------------------------------------------*/

Route::post('/create-khu-vuc', 'KhuVucController@createKhuVuc');
Route::get('/get-all-khu-vuc', 'KhuVucController@getAllKhuVuc');
Route::get('/get-one-khu-vuc/{id_khuvuc}', 'KhuVucController@getOneKhuVuc');
Route::put('/update-khu-vuc/{id_khuvuc}', 'KhuVucController@updateKhuVuc');
Route::delete('/delete-khu-vuc/{id_khuvuc}', 'KhuVucController@deleteKhuVuc');
Route::get('/search-khu-vuc', 'KhuVucController@searchKhuVuc');

/*-------------------------------------------
___________________Muc Dich Su Dung Dat_______
---------------------------------------------*/

Route::post('/create-muc-dich-su-dung-dat', 'MucDichSuDungDatController@createMucDichSuDungDat');
Route::get('/get-all-muc-dich-su-dung-dat', 'MucDichSuDungDatController@getAllMucDichSuDungDat');
Route::get('/get-one-muc-dich-su-dung-dat/{id_mucdichsudungdat}', 'MucDichSuDungDatController@getOneMucDichSuDungDat');
Route::put('/update-muc-dich-su-dung-dat/{id_mucdichsudungdat}', 'MucDichSuDungDatController@updateMucDichSuDungDat');
Route::delete('/delete-muc-dich-su-dung-dat/{id_mucdichsudungdat}', 'MucDichSuDungDatController@deleteMucDichSuDungDat');
Route::get('/search-muc-dich-su-dung-dat', 'MucDichSuDungDatController@searchMucDichSuDungDat');

/*-------------------------------------------
___________________Cong Ty___________________
---------------------------------------------*/

Route::post('/create-cong-ty', 'CongTyController@createCongTy');



