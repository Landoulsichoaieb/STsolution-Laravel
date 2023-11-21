<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\interrested;

class InterrestedController extends Controller
{
    function interrested(Request $req){

        $check = Interrested::where("user",$req->id)
        ->where("post",$req->postid)
        ->first();
        if($check){
            return["error","Already interrested"];
        }else{
        $inter = new Interrested;
        $inter->user = $req->id;
        $inter->post = $req->postid;
        $inter->save();
            return["success","Successfully interrested"];
        }
    }

    function countinter(Request $req){
        $count = \DB::table('interrested')->where('post',$req->id)->count();
        return($count);
    }

    function getinterrested(Request $req){

        $getinterrested = \DB::table('interrested')
    ->join('users', 'interrested.user', '=', 'users.id')
    ->join('imgp', 'interrested.user', '=', 'imgp.user')
    ->leftJoin('cvs', 'interrested.user', '=', 'cvs.user')
    ->where('interrested.post', $req->id)
    ->select('users.id','users.name','cvs.cv', \DB::raw("REPLACE(imgp.fileimg, 'public/profileimg', 'storage/profileimg') as fileimg"))
    ->get();
        return($getinterrested);
    }

    function acceptreq(Request $req){
        $user = $req->input('id');
        $post = $req->input('post');
        $accept = 1;
        $check = Interrested::where("user",$user)->where("post",$post)->first();
        if($check){
            $check->update([
            'status' => $accept ,
            ]);
            return ['success','Accepted successfully'];
        }else{
            return ['error','Somthing must be wrong'];
        }
    }
    function declinereq(Request $req){
        $user = $req->input('id');
        $post = $req->input('post');
        $refuse = 2;
        $check = Interrested::where("user",$user)->where("post",$post)->first();
        if($check){
            $check->update([
            'status' => $refuse ,
        ]);
            return ['success','Declined successfully'];
        }else{
            return ['error','Somthing must be wrong'];
        }
    }
    function getuserinter(Request $req){
        $getuserinter = \DB::table('interrested')
    ->join('posts', 'interrested.post', '=', 'posts.id')
    ->where('interrested.user', $req->id)
    ->select('posts.*','interrested.status')
    ->get();
        return($getuserinter);
    }

    function getifaccepted(Request $req){
        $check = Interrested::where("user",$req->id)->where("post",$req->post)->first();
        if($check["status"] == 0){
            return(null);
        }else{
            return($check);
        }
    }

}
