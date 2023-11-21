<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timeline;
use App\Models\Posts;

class TimelineController extends Controller
{
    function Addtimeline(Request $req){
        $check = Timeline::where('user',$req->id)->where('project',$req->post)->first();
        if(!$check){
            $status = 0;
            $post = Posts::find($req->post);
            $timeline = new Timeline;
            $timeline->user = $req->id;
            $timeline->company = $post->user;
            $timeline->project = $req->post;
            $timeline->message = $req->message;
            $timeline->status = $status;
            $timeline->save();
            return ['success','Timeline Added'];
        }else{
            return["Error","Timeline already exsist"];
        }
    }

    function gettimeline(Request $req){
        $gettimeline = Timeline::where('user',$req->id)->where('project',$req->post)->first();
        return($gettimeline);
    }
    /*
    function gettimelinebyid(Request $req){
        $gettimelinebyid = Timeline::where('id',$req->id)->first();
        return($gettimelinebyid);
    }*/

    function gettimelinebyid(Request $req){
        $gettimelinebyid = \DB::table('timeline')
    ->join('users', 'timeline.company', '=', 'users.id')
    ->where('timeline.id', $req->id)
    ->select('users.*', 'timeline.*')
    ->first();
        return($gettimelinebyid);
    }
}
