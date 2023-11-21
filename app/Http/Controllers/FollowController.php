<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;

class FollowController extends Controller
{
    function followcomp(request $req){

        $check = Follow::where("user",$req->id)
        ->where("company",$req->companyid)
        ->first();
        if($check){
            return["error","Already following"];
        }else{
        $follow = new Follow;
        $follow->user = $req->id;
        $follow->company = $req->companyid;
        $follow->save();
            return["success","Successfully following"];
        }

    }

    function unfollowcomp(Request $req){

        $check = Follow::where("user",$req->id)
        ->where("company",$req->companyid)
        ->first();
        if($check){
            $check->delete();
            return["success","You are no longer Following"];
        }else{
            return["error","Already Unfollowed"];
        }
    }

    function getfollow(Request $req){
        $check = Follow::where("user",$req->id)->where("company",$req->companyid)->first();
        if($check){
            return "false";
        }else{
            return "true";
        }
    }

    function followerbyid(Request $req){
        $count = \DB::table("follow")->where('company',$req->id)->count();
        return($count);
    }
}
