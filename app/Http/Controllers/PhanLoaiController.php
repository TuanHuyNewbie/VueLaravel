<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PhanLoaiController extends Controller
{
    public function createPhanLoai(Request $request){
        $query = "INSERT INTO `phanloai` (`id_phan_loai`,`id_hien_trang_vuon_cay`,`id_muc_dich_su_dung_dat`,`ky_hieu_phan_loai`,`dien_giai`) VALUES ('".$request->get('id_phan_loai')."','".$request->get('id_hien_trang_vuon_cay')."','".$request->get('id_muc_dich_su_dung_dat')."','".$request->get('ky_hieu_phan_loai')."','".$request->get('dien_giai')."')";
        $res = DB::select($query);
        return response()->json("success");
    }
    public function getAllPhanLoai(Request $request){
        $query ='SELECT phanloai.*, hientrangvuoncay.ky_hieu kh_htvc, mucdichsudungdat.ky_hieu kh_mdsdd 
                FROM `phanloai`
                INNER JOIN `hientrangvuoncay`
                ON phanloai.id_hien_trang_vuon_cay = hientrangvuoncay.id_hien_trang_vuon_cay
                INNER JOIN `mucdichsudungdat`
                ON phanloai.id_muc_dich_su_dung_dat = mucdichsudungdat.id_muc_dich_su_dung_dat';
        $res = DB::select($query);
        return response()->json(['data'=>$res]);
    }
    public function getOnePhanLoai($id_phan_loai){
        $query ='SELECT phanloai.*, hientrangvuoncay.ky_hieu kh_htvc, mucdichsudungdat.ky_hieu kh_mdsdd 
        FROM `phanloai`
        INNER JOIN `hientrangvuoncay`
        ON phanloai.id_hien_trang_vuon_cay = hientrangvuoncay.id_hien_trang_vuon_cay
        INNER JOIN `mucdichsudungdat`
        ON phanloai.id_muc_dich_su_dung_dat = mucdichsudungdat.id_muc_dich_su_dung_dat
        WHERE `id_phan_loai` = '.$id_phan_loai;
        $res = DB::select($query);
        return response()->json(['data'=>$res]);
    }
    public function updatePhanLoai($id_phan_loai, Request $request){
        $query = "UPDATE `phanloai` SET `id_hien_trang_vuon_cay` = '".$request->get('id_hien_trang_vuon_cay')."', `id_muc_dich_su_dung_dat` = '".$request->get('id_muc_dich_su_dung_dat')."', `ky_hieu_phan_loai` = '".$request->get('ky_hieu_phan_loai')."', `dien_giai` = '".$request->get('dien_giai')."' WHERE `id_phan_loai` = ".$id_phan_loai;
        $res = DB::select($query);
        return response()->json("success");
    }
    public function deletePhanLoai($id_phan_loai){
        $query = "DELETE FROM `phanloai` WHERE `id_phan_loai` = ".$id_phan_loai;
        $res = DB::select($query);
        return response()->json("success");
    }
    public function searchPhanLoai(Request $request){
        $textsearch = $request->get('TextSearch');
        $pagelimit = $request->get('PageLimit');
        $page = $request->get('Page');
        $search=[];
        $textsearch && array_push($search,['ky_hieu_phan_loai','like','%'.$textsearch.'%']);
        $res = DB::table('phanloai')->where($search)->paginate($pagelimit,'*','',$page);
        return response()->json($res);
    }
}
