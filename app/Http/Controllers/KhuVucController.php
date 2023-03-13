<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class KhuVucController extends Controller
{
    public function createKhuVuc(Request $request){
        $query = "INSERT INTO `khuvuc` (`id_khuvuc`,`ten_khu_vuc`,`hidden`) VALUES ('".$request->get('id_khuvuc')."','".$request->get('ten_khu_vuc')."','".$request->get('hidden')."')";
        $res = DB::select($query);
        return response()->json("success");
    }
    public function getAllKhuVuc(Request $request){
        $query ='SELECT * FROM `khuvuc`';
        $res = DB::select($query);
        return response()->json(['data'=>$res]);
    }
    public function getOneKhuVuc($id_khuvuc){
        $query ='SELECT * FROM `khuvuc` WHERE `id_khuvuc` = '.$id_khuvuc;
        $res = DB::select($query);
        return response()->json($res, 200);
    }
    public function updateKhuVuc($id_khuvuc, Request $request){
        $query = "UPDATE `khuvuc` SET `ten_khu_vuc` = '".$request->get('ten_khu_vuc')."', `hidden` = '".$request->get('hidden')."' WHERE `id_khuvuc` = ".$id_khuvuc;
        $res = DB::select($query);
        return response()->json("success");
    }
    public function deleteKhuVuc($id_khuvuc){
        $query = "DELETE FROM `khuvuc` WHERE `id_khuvuc` = ".$id_khuvuc;
        $res = DB::select($query);
        return response()->json("success");
    }
    public function searchKhuVuc(Request $request){
        $textsearch = $request->get('TextSearch');
        $pagelimit = $request->get('PageLimit');
        $page = $request->get('Page');
        $search=[];
        $textsearch && array_push($search,['ten_khu_vuc','like','%'.$textsearch.'%']);
        $res = DB::table('khuvuc')->where($search)->paginate($pagelimit,'*','',$page);
        return response()->json($res);
    }
}
