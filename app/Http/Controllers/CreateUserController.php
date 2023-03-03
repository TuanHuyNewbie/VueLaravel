<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CreateCollection;
use App\name2;
use DB;

class CreateUserController extends Controller
{
    public function createUser(Request $request){
        $user = new name2([
            'name' => $request->get('name'),
        ]);
        $user->save();
        return response()->json("success");
    }
    public function getAllUser(Request $request){
        $query ='SELECT * FROM `name2s`';
        $res = DB::select($query);
        return response()->json(['data'=>$res]);
    }
    public function getOneUser($id){
        $user = name2::find($id);
        return response()->json($user);
    }
    public function updateUser($id, Request $request){
        $user = name2::find($id);
        $user->update($request->all());
        return response()->json("Update Success");
    }
    public function deleteUser($id){
        $user = name2::find($id);
        $user->delete();
        return response()->json("Delete Success");
    }
    public function searchUser(Request $request){
        $textsearch = $request->get('TextSearch');
        // $query ="SELECT * FROM `name2s`" ;
        if($textsearch){
            $query ="SELECT * FROM `name2s` WHERE `name` like '%".$textsearch."%'" ;

        } else {
            $query ="SELECT * FROM `name2s`";
        }
        $res = DB::select($query);
        return response()->json($res);
    }
    public function getPage(Request $request){
        // if($request->get('TextSearch')){
            $textsearch = $request->get('TextSearch');
        //     $query ="SELECT * FROM `name2s` WHERE `name` like '%".$textsearch."%'" ;
        //     $ress = DB::select($query); 
        // } else {
        //     $query ="SELECT * FROM `name2s`";
        //     $ress = DB::select($query); 
        // }
        // $id = [];
        // foreach( $ress as $key => $value){
        //     array_push($id, $value->id);
        // }
        // // dd($id);

        $pagelimit = $request->get('PageLimit');
        $page = $request->get('Page');
        // $res =  $ress->paginate($pagelimit,'*','',$page);
        // return response()->json($res);
        $search=[];
        $textsearch && array_push($search,['name','like','%'.$textsearch.'%']);
      
        $res = DB::table('name2s')->where($search)->paginate($pagelimit,'*','',$page);
        return $res;
    }
}
