<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class NongTruongController extends Controller
{
    public function createNongTruong(Request $request){
        $query = "INSERT INTO `nongtruong` (`id_nong_truong`,`id_congty`,`ma_nong_truong`,`id_cong_ty`,`hidden`) VALUES ('".$request->get('id_nong_truong')."','".$request->get('id_congty')."','".$request->get('ma_nong_truong')."','".$request->get('id_cong_ty')."','".$request->get('hidden')."')";
        $res = DB::select($query);
        return response()->json("success");
    }
    public function getAllNongTruong(Request $request){
        $query ='SELECT * FROM `nongtruong`';
        $res = DB::select($query);
        return response()->json(['data'=>$res]);
    }
    public function getOneNongTruong($id_nong_truong){
        $query ='SELECT * FROM `nongtruong` WHERE `id_nong_truong` = '.$id_nong_truong;
        $res = DB::select($query);
        return response()->json(['data'=>$res]);
    }
    public function updateNongTruong($id_nong_truong, Request $request){
        $query = "UPDATE `nongtruong` SET `id_congty` = '".$request->get('id_congty')."', `ma_nong_truong` = '".$request->get('ma_nong_truong')."', `id_cong_ty` = '".$request->get('id_cong_ty')."', `hidden` = '".$request->get('hidden')."' WHERE `id_nong_truong` = ".$id_nong_truong;
        $res = DB::select($query);
        return response()->json("success");
    }
    public function deleteNongTruong($id_nong_truong){
        $query = "DELETE FROM `nongtruong` WHERE `id_nong_truong` = ".$id_nong_truong;
        $res = DB::select($query);
        return response()->json("success");
    }
    public function searchNongTruong(Request $request){
        $textsearch = $request->get('TextSearch');
        $pagelimit = $request->get('PageLimit');
        $page = $request->get('Page');
        $search=[];
        $textsearch && array_push($search,['ma_nong_truong','like','%'.$textsearch.'%']);
        $res = DB::table('nongtruong')->where($search)->paginate($pagelimit,'*','',$page);
        return response()->json($res);
    }
}
