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
Route::get('/get-all-cong-ty', 'CongTyController@getAllCongTy');
Route::get('/get-one-cong-ty/{id_congty}', 'CongTyController@getOneCongTy');
Route::put('/update-cong-ty/{id_congty}', 'CongTyController@updateCongTy');
Route::delete('/delete-cong-ty/{id_congty}', 'CongTyController@deleteCongTy');
Route::get('/search-cong-ty', 'CongTyController@searchCongTy');

/*-------------------------------------------
___________________Hien Trang Vuon Cay_______
---------------------------------------------*/

Route::post('/create-hien-trang-vuon-cay', 'HienTrangVuonCayController@createHienTrangVuonCay');
Route::get('/get-all-hien-trang-vuon-cay', 'HienTrangVuonCayController@getAllHienTrangVuonCay');
Route::get('/get-one-hien-trang-vuon-cay/{id_hientrangvuoncay}', 'HienTrangVuonCayController@getOneHienTrangVuonCay');
Route::put('/update-hien-trang-vuon-cay/{id_hien_trang_vuon_cay}', 'HienTrangVuonCayController@updateHienTrangVuonCay');
Route::delete('/delete-hien-trang-vuon-cay/{id_hientrangvuoncay}', 'HienTrangVuonCayController@deleteHienTrangVuonCay');
Route::get('/search-hien-trang-vuon-cay', 'HienTrangVuonCayController@searchHienTrangVuonCay');

/*-------------------------------------------
___________________Nong Truong_______________
---------------------------------------------*/

Route::post('/create-nong-truong', 'NongTruongController@createNongTruong');
Route::get('/get-all-nong-truong', 'NongTruongController@getAllNongTruong');
Route::get('/get-one-nong-truong/{id_nongtruong}', 'NongTruongController@getOneNongTruong');
Route::put('/update-nong-truong/{id_nongtruong}', 'NongTruongController@updateNongTruong');
Route::delete('/delete-nong-truong/{id_nongtruong}', 'NongTruongController@deleteNongTruong');
Route::get('/search-nong-truong', 'NongTruongController@searchNongTruong');


/*-------------------------------------------
___________________Phan Loai_________________
---------------------------------------------*/

Route::post('/create-phan-loai', 'PhanLoaiController@createPhanLoai');
Route::get('/get-all-phan-loai', 'PhanLoaiController@getAllPhanLoai');
Route::get('/get-one-phan-loai/{id_phanloai}', 'PhanLoaiController@getOnePhanLoai');
Route::put('/update-phan-loai/{id_phanloai}', 'PhanLoaiController@updatePhanLoai');
Route::delete('/delete-phan-loai/{id_phanloai}', 'PhanLoaiController@deletePhanLoai');
Route::get('/search-phan-loai', 'PhanLoaiController@searchPhanLoai');

/*-------------------------------------------
___________________Lo Canh Tac_______________
---------------------------------------------*/

Route::post('/create-lo-canh-tac', 'LoCanhTacController@createLoCanhTac');
Route::get('/get-all-lo-canh-tac', 'LoCanhTacController@getAllLoCanhTac');
Route::get('/get-one-lo-canh-tac/{id_locanhtac}', 'LoCanhTacController@getOneLoCanhTac');
Route::put('/update-lo-canh-tac/{id_locanhtac}', 'LoCanhTacController@updateLoCanhTac');
Route::delete('/delete-lo-canh-tac/{id_locanhtac}', 'LoCanhTacController@deleteLoCanhTac');
Route::get('/search-lo-canh-tac', 'LoCanhTacController@searchLoCanhTac');
