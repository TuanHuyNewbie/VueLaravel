<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CongTyController extends Controller
{
    public function createCongTy(Request $request){
        $query = "INSERT INTO `congty` (`id_congty`,`id_khuvuc`,`ma_cong_ty`,`ten_cong_ty`,`hidden`) 
            VALUES ('".$request->get('id_congty')."','".$request->get('id_khuvuc')."','".$request->get('ma_cong_ty')."','".$request->get('ten_cong_ty')."','".$request->get('hidden')."')";
        $res = DB::select($query);
        return response()->json("success");
    }
    public function getAllCongTy(Request $request){
       
        $query ='SELECT * FROM `congty`';
        $res = DB::select($query);
        return response()->json(['data'=>$res]);
    }
    public function getOneCongTy($id_cong_ty){
        $query ='SELECT * FROM `congty` WHERE `id_congty` = '.$id_cong_ty;
        $res = DB::select($query);
        return response()->json(['data'=>$res]);
    }
    public function updateCongTy($id_congty, Request $request){
        $query = "UPDATE `congty` SET `id_khuvuc` = '".$request->get('id_khuvuc')."', `ma_cong_ty` = '".$request->get('ma_cong_ty')."', `ten_cong_ty` = '".$request->get('ten_cong_ty')."', `hidden` = '".$request->get('hidden')."' WHERE `id_congty` = ".$id_congty;
        $res = DB::select($query);
        return response()->json("success");
    }
    public function deleteCongTy($id_cong_ty){
        $query = "DELETE FROM `congty` WHERE `id_congty` = ".$id_cong_ty;
        $res = DB::select($query);
        return response()->json("success");
    }
    public function searchCongTy(Request $request){
        $textsearch = $request->get('TextSearch');
        $pagelimit = $request->get('PageLimit');
        $page = $request->get('Page');
        $search=[];
        $textsearch && array_push($search,['ten_cong_ty','like','%'.$textsearch.'%']);
        $res = DB::table('congty')->where($search)->paginate($pagelimit,'*','',$page);
        return response()->json($res);
    }
}
