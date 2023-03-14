<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LoCanhTacController extends Controller
{
    public function createLoCanhTac(Request $request){
        $query = "INSERT INTO `lo_canh_tac` (
            `id_lo_canh_tac`,
            `id_nong_truong`,
            `id_hien_trang_vuon_cay`,
            `id_phan_loai`,
            `ma_lo`,
            `thu_tu`,
            `nam_trong`,
            `ten_lo_cu`,
            `ten_lo_moi`,
            `gia_tri_phan_loai`,
            `hang_dat`,
            `ct_thap`,
            `ct_cao`,
            `pp_trong`,
            `khoang_cach_trong`,
            `mat_do_thiet_ke`,
            `giong_cay`,
            `mat_do_ghep_vuon_tc`,
            `ngay_ket_thuc_trong_vuon_tc`) 
            VALUES (
                '".$request->get('id_lo_canh_tac')."',
                '".$request->get('id_nong_truong')."',
                '".$request->get('id_hien_trang_vuon_cay')."',
                '".$request->get('id_phan_loai')."',
                '".$request->get('ma_lo')."',
                '".$request->get('thu_tu')."',
                '".$request->get('nam_trong')."',
                '".$request->get('ten_lo_cu')."',
                '".$request->get('ten_lo_moi')."',
                '".$request->get('gia_tri_phan_loai')."',
                '".$request->get('hang_dat')."',
                '".$request->get('ct_thap')."',
                '".$request->get('ct_cao')."',
                '".$request->get('pp_trong')."',
                '".$request->get('khoang_cach_trong')."',
                '".$request->get('mat_do_thiet_ke')."',
                '".$request->get('giong_cay')."',
                '".$request->get('mat_do_ghep_vuon_tc')."',
                '".$request->get('ngay_ket_thuc_trong_vuon_tc')."')";
        $res = DB::select($query);
        return response()->json("success");
    }
    public function getAllLoCanhTac(Request $request){
        $query ='SELECT lo_canh_tac.*, nongtruong.ma_nong_truong, hientrangvuoncay.ky_hieu kh_htvc, phanloai.ky_hieu_phan_loai kh_pl
        FROM `lo_canh_tac`
        INNER JOIN `nongtruong` 
        ON lo_canh_tac.id_nong_truong = nongtruong.id_nong_truong
        INNER JOIN `hientrangvuoncay`
        ON lo_canh_tac.id_hien_trang_vuon_cay = hientrangvuoncay.id_hien_trang_vuon_cay
        INNER JOIN `phanloai`
        ON lo_canh_tac.id_phan_loai = phanloai.id_phan_loai';
        $res = DB::select($query);
        return response()->json(['data'=>$res]);
    }
    public function getOneLoCanhTac($id_lo_canh_tac){
        $query ='SELECT lo_canh_tac.*, nongtruong.ma_nong_truong, hientrangvuoncay.ky_hieu kh_htvc, phanloai.ky_hieu_phan_loai kh_pl
        FROM `lo_canh_tac`
        INNER JOIN `nongtruong` 
        ON lo_canh_tac.id_nong_truong = nongtruong.id_nong_truong
        INNER JOIN `hientrangvuoncay`
        ON lo_canh_tac.id_hien_trang_vuon_cay = hientrangvuoncay.id_hien_trang_vuon_cay
        INNER JOIN `phanloai`
        ON lo_canh_tac.id_phan_loai = phanloai.id_phan_loai 
        WHERE id_lo_canh_tac = '.$id_lo_canh_tac;
        $res = DB::select($query);
        return response()->json($res, 200);
    }
    public function updateLoCanhTac($id_lo_canh_tac, Request $request){
        $query = "UPDATE `lo_canh_tac` SET
            `id_nong_truong` = '".$request->get('id_nong_truong')."', 
            `id_hien_trang_vuon_cay` = '".$request->get('id_hien_trang_vuon_cay')."',
            `id_phan_loai` = '".$request->get('id_phan_loai')."',
            `ma_lo` = '".$request->get('ma_lo')."',
            `thu_tu` = '".$request->get('thu_tu')."',
            `nam_trong` = '".$request->get('nam_trong')."',
            `ten_lo_cu` = '".$request->get('ten_lo_cu')."',
            `ten_lo_moi` = '".$request->get('ten_lo_moi')."',
            `gia_tri_phan_loai` = '".$request->get('gia_tri_phan_loai')."',
            `hang_dat` = '".$request->get('hang_dat')."',
            `ct_thap` = '".$request->get('ct_thap')."',
            `ct_cao` = '".$request->get('ct_cao')."',
            `pp_trong` = '".$request->get('pp_trong')."',
            `khoang_cach_trong` = '".$request->get('khoang_cach_trong')."',
            `mat_do_thiet_ke` = '".$request->get('mat_do_thiet_ke')."',
            `giong_cay` = '".$request->get('giong_cay')."',
            `mat_do_ghep_vuon_tc` = '".$request->get('mat_do_ghep_vuon_tc')."',
            `ngay_ket_thuc_trong_vuon_tc` = '".$request->get('ngay_ket_thuc_trong_vuon_tc')."'
            WHERE `id_lo_canh_tac` = ".$id_lo_canh_tac;
        $res = DB::select($query);
        return response()->json("success");
    }
    public function deleteLoCanhTac($id_lo_canh_tac){
        $query = "DELETE FROM `lo_canh_tac` WHERE `id_lo_canh_tac` = ".$id_lo_canh_tac;
        $res = DB::select($query);
        return response()->json("success");
    }
    public function searchLoCanhTac(Request $request){
        $textsearch = $request->get('TextSearch');
        $pagelimit = $request->get('PageLimit');
        $page = $request->get('Page');
        $search=[];
        $textsearch && array_push($search,['ma_lo','like','%'.$textsearch.'%']);
        $res = DB::table('lo_canh_tac')->where($search)->paginate($pagelimit,'*','',$page);
        return response()->json($res);
    }

}
