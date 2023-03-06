<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserCollection;
// use App\
use DB;
use md5;

class UserController extends Controller
{
    public function createUser(Request $request){
        $pass = md5(md5($request->get('password')));
        $query = "INSERT INTO `usertable` (`username`, `password`, `name`) VALUES ('".$request->get('username')."', '".$pass."', '".$request->get('name')."')";
        $res = DB::select($query);
        return response()->json("success");
    }
    public function getAllUser(Request $request){
        $query ='SELECT * FROM `usertable`';
        $res = DB::select($query);
        return response()->json(['data'=>$res]);
    }
    public function getOneUser($id){
        $query ='SELECT * FROM `usertable` WHERE `id` = '.$id;
        $res = DB::select($query);
        return response()->json($res);
    }
    public function updateUser($id, Request $request){
        $pass = md5(md5($request->get('password')));
        $query = "UPDATE `usertable` SET `password` = '".$pass."', `name` = '".$request->get('name')."' WHERE `id` = ".$id;
        $res = DB::select($query);
        return response()->json("Update Success");
    }
    public function deleteUser($id){
        $query = "DELETE FROM `usertable` WHERE `id` = ".$id;
        $res = DB::select($query);
        return response()->json("Delete Success");
    }
    public function searchUser(Request $request){
        $textsearch = $request->get('TextSearch');
        // $query ="SELECT * FROM `name2s`" ;
        if($textsearch){
            $query ="SELECT * FROM `usertables` WHERE `name` like '%".$textsearch."%'" ;

        } else {
            $query ="SELECT * FROM `usertables`";
        }
        $res = DB::select($query);
        return response()->json($res);
    }
}
