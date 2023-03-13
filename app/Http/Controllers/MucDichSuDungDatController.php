<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MucDichSuDungDatController extends Controller
{
    public function createMucDichSuDungDat(Request $request){
        $query = "INSERT INTO `mucdichsudungdat` (`id_muc_dich_su_dung_dat`,`ky_hieu`,`hien_trang`,`dien_giai`) VALUES ('".$request->get('id_muc_dich_su_dung_dat')."','".$request->get('ky_hieu')."','".$request->get('hien_trang')."','".$request->get('dien_giai')."')";
        $res = DB::select($query);
        return response()->json("success");
    }
    public function getAllMucDichSuDungDat(Request $request){
        $query ='SELECT * FROM `mucdichsudungdat`';
        $res = DB::select($query);
        return response()->json(['data'=>$res]);
    }
    public function getOneMucDichSuDungDat($id_mucdichsudungdat){
        $query ='SELECT * FROM `mucdichsudungdat` WHERE `id_muc_dich_su_dung_dat` = '.$id_mucdichsudungdat;
        $res = DB::select($query);
        return response()->json($res, 200);
    }
    public function updateMucDichSuDungDat($id_muc_dich_su_dung_dat, Request $request){
        $query = "UPDATE `mucdichsudungdat` SET `ky_hieu` = '".$request->get('ky_hieu')."', `hien_trang` = '".$request->get('hien_trang')."', `dien_giai` = '".$request->get('dien_giai')."' WHERE `id_muc_dich_su_dung_dat` = ".$id_muc_dich_su_dung_dat;
        $res = DB::select($query);
        return response()->json("success");
    }
    public function deleteMucDichSuDungDat($id_muc_dich_su_dung_dat){
        $query = "DELETE FROM `mucdichsudungdat` WHERE `id_muc_dich_su_dung_dat` = ".$id_muc_dich_su_dung_dat;
        $res = DB::select($query);
        return response()->json("success");
    }
    public function searchMucDichSuDungDat(Request $request){
        $textsearch = $request->get('TextSearch');
        $pagelimit = $request->get('PageLimit');
        $page = $request->get('Page');
        $search=[];
        $textsearch && array_push($search,['ky_hieu','like','%'.$textsearch.'%']);
        $res = DB::table('mucdichsudungdat')->where($search)->paginate($pagelimit,'*','',$page);
        return response()->json($res);
    }
}
