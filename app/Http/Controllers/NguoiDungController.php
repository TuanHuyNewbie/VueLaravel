<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use md5;

class NguoiDungController extends Controller
{
    public function createNguoiDung(Request $request){
        $file = $request->file('hinh_anh');
        $file->move(public_path('\img'), $file->getClientOriginalName());
        $date = Carbon::createFromFormat('d/m/Y', $request->get('ngay_sinh'))->format('Y-m-d');        
        // $dir = (string)public_path('\img\\');
        // $fileName = (string)$file->getClientOriginalName();
        // $pathImage = $dir.$fileName;
        // dd($pathImage);
       
        $query = 'INSERT INTO `Nguoi_Dung`(
            `ten_dang_nhap`, 
            `mat_khau`, 
            `ho_ten`, 
            `ngay_sinh`, 
            `gioi_tinh`, 
            `hinh_anh`, 
            `chuc_vu`, 
            `trang_thai`) VALUES (
                "'.$request->get('ten_dang_nhap').'",
                "'.md5(md5($request->get('mat_khau'))).'",
                "'.$request->get('ho_ten').'",
                "'.$date.'",
                "'.$request->get('gioi_tinh').'",
                "'.$file->getClientOriginalName().'",
                "'.$request->get('chuc_vu').'",
                "'.$request->get('trang_thai').'")';
        $res = DB::select($query);
        return response()->json("Success");
    }
    public function getAllNguoiDung(Request $request){
        $query ='SELECT * FROM `Nguoi_Dung`';
        $res = DB::select($query);
        return response()->json(['data'=>$res]);
    }
    public function getOneNguoiDung($id_nguoi_dung){
        $query ='SELECT * FROM `Nguoi_Dung` WHERE `id_nguoi_dung` = '.$id_nguoi_dung;
        $res = DB::select($query);
        return response()->json($res);
    }
    public function updateNguoiDung($id_nguoi_dung, Request $request){
        $password = md5(md5($request->get('mat_khau')));
        $date = Carbon::createFromFormat('d/m/Y', $request->get('ngay_sinh'))->format('Y-m-d');
        $query = 'UPDATE `Nguoi_Dung` SET 
            `mat_khau` = "'.$password.'",
            `ho_ten` = "'.$request->get('ho_ten').'",
            `ngay_sinh` = "'.$date.'",
            `gioi_tinh` = "'.$request->get('gioi_tinh').'",
            `hinh_anh` = "'.$request->get('hinh_anh').'",
            `chuc_vu` = "'.$request->get('chuc_vu').'",
            `trang_thai` = "'.$request->get('trang_thai').'"
            WHERE `id_nguoi_dung` = "'.$id_nguoi_dung.'"';
        $res = DB::select($query);
        return response()->json("Success");
    }
    public function deleteNguoiDung($id_nguoi_dung){
        $query = 'DELETE FROM `Nguoi_Dung` WHERE `id_nguoi_dung` = '.$id_nguoi_dung;
        $res = DB::select($query);
        return response()->json("Success");
    }
    public function searchNguoiDung(Request $request){
        $textsearch = $request->get('TextSearch');
        $pagelimit = $request->get('PageLimit');
        $page = $request->get('Page');
        $search = [];
        $textsearch &&  array_push($search, ['ho_ten', 'LIKE', '%'.$textsearch.'%']);
        $res = DB::table('Nguoi_Dung')->where($search)->paginate($pagelimit, ['*'], 'page', $page);
        return response()->json($res);
    }
}
