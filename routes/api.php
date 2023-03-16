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
Route::group(['middleware' => 'jwt.auth'], function () {
    // Các tuyến đường API ở đây

// Route::group(['middleware' => ['checkRole: Admin']], function () {
//     Route::post('/create-user', 'UserController@createUser');
// });
// Route::get('/get-all-user', 'UserController@getAllUser');
// Route::get('/get-one-user/{id}', 'UserController@getOneUser');
// Route::group(['middleware' => ['checkRole: Admin']], function () {
//     Route::put('/update-user/{id}', 'UserController@updateUser');
// Route::delete('/delete-user/{id}', 'UserController@deleteUser');
// Route::get('/search-user', 'UserController@searchUser');

/*-------------------------------------------
___________________Khu Vuc___________________
---------------------------------------------*/

Route::group(['middleware' => ['checkRole: Admin']], function () {
    Route::post('/create-khu-vuc', 'KhuVucController@createKhuVuc');
});
Route::get('/get-all-khu-vuc', 'KhuVucController@getAllKhuVuc');
Route::get('/get-one-khu-vuc/{id_khuvuc}', 'KhuVucController@getOneKhuVuc');
Route::group(['middleware' => ['checkRole: Admin']], function () {
    Route::post('/update-khu-vuc/{id_khuvuc}', 'KhuVucController@updateKhuVuc')->middleware('auth','CheckRole:2');
});
Route::group(['middleware' => ['checkRole: Admin']], function () {
    Route::delete('/delete-khu-vuc/{id_khuvuc}', 'KhuVucController@deleteKhuVuc');
});
Route::get('/search-khu-vuc', 'KhuVucController@searchKhuVuc');

/*-------------------------------------------
___________________Muc Dich Su Dung Dat_______
---------------------------------------------*/

Route::group(['middleware' => ['checkRole: Admin']], function () {
    Route::post('/create-muc-dich-su-dung-dat', 'MucDichSuDungDatController@createMucDichSuDungDat');
});
Route::get('/get-all-muc-dich-su-dung-dat', 'MucDichSuDungDatController@getAllMucDichSuDungDat');
Route::get('/get-one-muc-dich-su-dung-dat/{id_mucdichsudungdat}', 'MucDichSuDungDatController@getOneMucDichSuDungDat');
Route::group(['middleware' => ['checkRole: Admin']], function () {
    Route::post('/update-muc-dich-su-dung-dat/{id_mucdichsudungdat}', 'MucDichSuDungDatController@updateMucDichSuDungDat');
});
Route::group(['middleware' => ['checkRole: Admin']], function () {
    Route::delete('/delete-muc-dich-su-dung-dat/{id_mucdichsudungdat}', 'MucDichSuDungDatController@deleteMucDichSuDungDat');
});
Route::get('/search-muc-dich-su-dung-dat', 'MucDichSuDungDatController@searchMucDichSuDungDat');

/*-------------------------------------------
___________________Cong Ty___________________
---------------------------------------------*/
Route::group(['middleware' => ['checkRole: Admin']], function () {
    Route::post('/create-cong-ty', 'CongTyController@createCongTy');
});
Route::get('/get-all-cong-ty', 'CongTyController@getAllCongTy');
Route::get('/get-one-cong-ty/{id_congty}', 'CongTyController@getOneCongTy');
Route::group(['middleware' => ['checkRole: Admin']], function () {
    Route::post('/update-cong-ty/{id_congty}', 'CongTyController@updateCongTy');
});
Route::group(['middleware' => ['checkRole: Admin']], function () {
    Route::delete('/delete-cong-ty/{id_congty}', 'CongTyController@deleteCongTy');
});
Route::get('/search-cong-ty', 'CongTyController@searchCongTy');

/*-------------------------------------------
___________________Hien Trang Vuon Cay_______
---------------------------------------------*/
Route::group(['middleware' => ['checkRole: Admin']], function () {
    Route::post('/create-hien-trang-vuon-cay', 'HienTrangVuonCayController@createHienTrangVuonCay');
});
Route::get('/get-all-hien-trang-vuon-cay', 'HienTrangVuonCayController@getAllHienTrangVuonCay');
Route::get('/get-one-hien-trang-vuon-cay/{id_hientrangvuoncay}', 'HienTrangVuonCayController@getOneHienTrangVuonCay');
Route::group(['middleware' => ['checkRole: Admin']], function () {
    Route::post('/update-hien-trang-vuon-cay/{id_hientrangvuoncay}', 'HienTrangVuonCayController@updateHienTrangVuonCay');
});
Route::group(['middleware' => ['checkRole: Admin']], function () {
    Route::delete('/delete-hien-trang-vuon-cay/{id_hientrangvuoncay}', 'HienTrangVuonCayController@deleteHienTrangVuonCay');
});
Route::get('/search-hien-trang-vuon-cay', 'HienTrangVuonCayController@searchHienTrangVuonCay');

/*-------------------------------------------
___________________Nong Truong_______________
---------------------------------------------*/
Route::group(['middleware' => ['checkRole: Admin']], function () {
    Route::post('/create-nong-truong', 'NongTruongController@createNongTruong');
});
Route::get('/get-all-nong-truong', 'NongTruongController@getAllNongTruong');
Route::get('/get-one-nong-truong/{id_nongtruong}', 'NongTruongController@getOneNongTruong');
Route::group(['middleware' => ['checkRole: Admin']], function () {
    Route::post('/update-nong-truong/{id_nongtruong}', 'NongTruongController@updateNongTruong');
});
Route::group(['middleware' => ['checkRole: Admin']], function () {
    Route::delete('/delete-nong-truong/{id_nongtruong}', 'NongTruongController@deleteNongTruong');
});
Route::get('/search-nong-truong', 'NongTruongController@searchNongTruong');


/*-------------------------------------------
___________________Phan Loai_________________
---------------------------------------------*/

Route::group(['middleware' => ['checkRole: Admin']], function () {
    Route::post('/create-phan-loai', 'PhanLoaiController@createPhanLoai');
});
Route::get('/get-all-phan-loai', 'PhanLoaiController@getAllPhanLoai');
Route::get('/get-one-phan-loai/{id_phanloai}', 'PhanLoaiController@getOnePhanLoai');
Route::group(['middleware' => ['checkRole: Admin']], function () {
    Route::post('/update-phan-loai/{id_phanloai}', 'PhanLoaiController@updatePhanLoai');
});
Route::group(['middleware' => ['checkRole: Admin']], function () {
    Route::delete('/delete-phan-loai/{id_phanloai}', 'PhanLoaiController@deletePhanLoai');
});
Route::get('/search-phan-loai', 'PhanLoaiController@searchPhanLoai');

/*-------------------------------------------
___________________Lo Canh Tac_______________
---------------------------------------------*/

Route::group(['middleware' => ['checkRole: Admin']], function () {
    Route::post('/create-lo-canh-tac', 'LoCanhTacController@createLoCanhTac');
});
Route::get('/get-all-lo-canh-tac', 'LoCanhTacController@getAllLoCanhTac');
Route::get('/get-one-lo-canh-tac/{id_locanhtac}', 'LoCanhTacController@getOneLoCanhTac');
Route::group(['middleware' => ['checkRole: Admin']], function () {
    Route::post('/update-lo-canh-tac/{id_locanhtac}', 'LoCanhTacController@updateLoCanhTac');
});
Route::group(['middleware' => ['checkRole: Admin']], function () {
    Route::delete('/delete-lo-canh-tac/{id_locanhtac}', 'LoCanhTacController@deleteLoCanhTac');
});
Route::get('/search-lo-canh-tac', 'LoCanhTacController@searchLoCanhTac');



/*-------------------------------------------
___________________Nguoi Dung________________
---------------------------------------------*/

Route::group(['middleware' => ['checkRole: Admin']], function () {
    Route::post('/create-nguoi-dung', 'NguoiDungController@createNguoiDung');
});
Route::get('/get-all-nguoi-dung', 'NguoiDungController@getAllNguoiDung');
Route::get('/get-one-nguoi-dung/{id_nguoi_dung}', 'NguoiDungController@getOneNguoiDung');
Route::group(['middleware' => ['checkRole: Admin']], function () {
    Route::post('/update-nguoi-dung/{id_nguoi_dung}', 'NguoiDungController@updateNguoiDung');
});
Route::group(['middleware' => ['checkRole: Admin']], function () {
    Route::delete('/delete-nguoi-dung/{id_nguoidung}', 'NguoiDungController@deleteNguoiDung');
});
Route::get('/search-nguoi-dung', 'NguoiDungController@searchNguoiDung');

});
/*-------------------------------------------
___________________User Login________________
---------------------------------------------*/

// Route::post('/login', 'UserLoginController@login');
Route::post('/login', 'AuthController@login');
Route::get('/me', 'AuthController@me');
Route::post('/signup', 'AuthController@register');


Route::middleware('auth:api')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
// Route::post('/signup', 'AuthController@register');
// Route::group([

//     'middleware' => 'api',
//     'namespace' => 'App\Http\Controllers',
//     'prefix' => 'auth'

// ], function ($router) {
    
//     Route::post('logout', 'AuthController@logout');
//     Route::post('refresh', 'AuthController@refresh');
//     Route::post('me', 'AuthController@me');

// });
