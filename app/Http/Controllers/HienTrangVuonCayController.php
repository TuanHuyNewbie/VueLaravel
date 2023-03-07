<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HienTrangVuonCayController extends Controller
{
    public function createHienTrangVuonCay(Request $request){
        $query = "INSERT INTO `hientrangvuoncay` (`id_hien_trang_vuon_cay`,`ky_hieu`,`dien_giai`) VALUES ('".$request->get('id_hien_trang_vuon_cay')."','".$request->get('ky_hieu')."','".$request->get('dien_giai')."')";
        $res = DB::select($query);
        return response()->json("success");
    }
    public function getAllHienTrangVuonCay(Request $request){
        $query ='SELECT * FROM `hientrangvuoncay`';
        $res = DB::select($query);
        return response()->json(['data'=>$res]);
    }
    public function getOneHienTrangVuonCay($id_hien_trang_vuon_cay){
        $query ='SELECT * FROM `hientrangvuoncay` WHERE `id_hien_trang_vuon_cay` = '.$id_hien_trang_vuon_cay;
        $res = DB::select($query);
        return response()->json(['data'=>$res]);
    }
    public function updateHienTrangVuonCay($id_hien_trang_vuon_cay, Request $request){
        $query = "UPDATE `hientrangvuoncay` SET `ky_hieu` = '".$request->get('ky_hieu')."', `dien_giai` = '".$request->get('dien_giai')."' WHERE `id_hien_trang_vuon_cay` = ".$id_hien_trang_vuon_cay;
        $res = DB::select($query);
        return response()->json("success");
    }
    public function deleteHienTrangVuonCay($id_hien_trang_vuon_cay){
        $query = "DELETE FROM `hientrangvuoncay` WHERE `id_hien_trang_vuon_cay` = ".$id_hien_trang_vuon_cay;
        $res = DB::select($query);
        return response()->json("success");
    }
    public function searchHienTrangVuonCay(Request $request){
        $textsearch = $request->get('TextSearch');
        $pagelimit = $request->get('PageLimit');
        $page = $request->get('Page');
        $search=[];
        $textsearch && array_push($search,['ky_hieu','like','%'.$textsearch.'%']);
        $res = DB::table('hientrangvuoncay')->where($search)->paginate($pagelimit,'*','',$page);
        return response()->json($res);
    }
}
