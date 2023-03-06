<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CongTyController extends Controller
{
    public function createCongTy(Request $request){
        $query = "INSERT INTO `congty` (`id_congty`,`id_khuvuc`,`ma_cong_ty`,`ten_cong_ty`,`hidden`) VALUES ('".$request->get('id_cong_ty')."','".$request->get('id_khuvuc')."','".$request->get('ma_cong_ty')."','".$request->get('ten_cong_ty')."','".$request->get('hidden')."')";
        $res = DB::select($query);
        return response()->json("success");
    }
}
