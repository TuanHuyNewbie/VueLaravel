<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use md5;
use DB;

class UserLoginController extends Controller
{
    public function login(Request $request){
        dd($request->get('username'));
        $username = $request->get('username');
        $password = $request->get('password');
        
        $md5PassWord = md5(md5($password));
        $query = "SELECT * FROM `nguoi_dung` WHERE `ten_dang_nhap` = '".$username."' AND `mat_khau` = '".$md5PassWord."'";
        $res = DB::select($query);
        // if(count($res) > 0){
        //     return response()->json($res, 200);
        // }else{
        //     return response()->json('null', 404);
        // }
        return response()->json($res, 200);
    }
}
