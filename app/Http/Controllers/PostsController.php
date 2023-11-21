<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Usertag;
use App\Models\Interrested;

class PostsController extends Controller
{
    function addpost(Request $req)
    {
        $valid = Validator(
            ['details' => $req->input('details')],
            ['details' => ['required', 'min:4', 'max:355']],
        );
        if ( $valid->fails() ) {
            return["error","Minimum 4 characters required and maximum is 355 characters."];
        }else{

            switch ($req->input('myfield')) {
                case("My field"):
                    $myfield = "";
                break;
                default:
                $myfield = $req->input('myfield');
            }switch ($req->input('prog1')) {
                case("Programming language"):
                    $prog1 = "";
                break;
                default:
                $prog1 = $req->input('prog1');
            }switch ($req->input('prog2')) {
                case("Programming language"):
                    $prog2 = "";
                break;
                default:
                $prog2 = $req->input('prog2');
            }switch ($req->input('frame1')) {
                case("Framework"):
                    $frame1 = "";
                break;
                default:
                $frame1 = $req->input('frame1');
            }switch ($req->input('frame2')) {
                case("Framework"):
                    $frame2 = "";
                break;
                default:
                $frame2 = $req->input('frame2');
            }

        $post = new Posts;
        $post->user = $req->id;
        $post->myfield = $myfield;
        $post->prog1 = $prog1;
        $post->prog2 = $prog2;
        $post->frame1 = $frame1;
        $post->frame2 = $frame2;
        $post->details = $req->input('details');
        $post->save();
        return ['success','Post Added successfully'];
        }
    }
    function getmyposts(Request $req){
        $mypost = Posts::where("user",$req->id)->get();
        return($mypost);
    }

    function getfollowedposts(Request $req){

        $getfollowedposts = \DB::table('Posts')
        ->join('follow', 'Posts.user', '=', 'follow.company')
        ->join('users', 'follow.company', '=', 'users.id')
        ->join('imgp', 'follow.company', '=', 'imgp.user')
        ->where('follow.user', '=', $req->id)
        ->select('Posts.*', 'users.name',\DB::raw("REPLACE(imgp.fileimg, 'public/profileimg', 'storage/profileimg') as fileimg"))
        ->limit(15)
        ->get();
        return $getfollowedposts;
    }
    function getbypost(Request $req){

        $getbypost = \DB::table('Posts')
    ->join('users', 'Posts.user', '=', 'users.id')
    ->join('imgp', 'Posts.user', '=', 'imgp.user')
    ->where('Posts.id', $req->id)
    ->select('Posts.*', 'users.name', \DB::raw("REPLACE(imgp.fileimg, 'public/profileimg', 'storage/profileimg') as fileimg"))
    ->first();
        return($getbypost);
    }

    function delpost(Request $req){
        $checkpost = Posts::where('user',$req->id)->where('id',$req->postid)->first();
        if($checkpost){
        $delpost = Posts::find($req->postid)->delete();
        $delinter = Interrested::where('post', $req->postid)->delete();
        return["Success","Post deleted successfully"];
        }else{

        return["Error","Something wrong happened"];
        }
    }

    function getuserposttag(Request $req){
        $getpost = Posts::where('id',$req->post)->first();
        $gettags = Usertag::where("user",$req->id)->first();
        if($gettags){
        if($getpost["myfield"] == $gettags["myfield"]){
           $res1 = "verified";
           $score1 = 25;
        }else{
            $res1 = "not";
            $score1 = 0;
        }if($getpost["prog1"] == $gettags["prog1"]){
            $res2 = "verified";
            $score2 = 20;
         }else{
             $res2 = "not";
             $score2 = 0;
         }if($getpost["prog2"] == $gettags["prog2"]){
            $res3 = "verified";
            $score3 = 15;
         }else{
             $res3 = "not";
             $score3 = 0;
         }if($getpost["frame1"] == $gettags["frame1"]){
            $res4 = "verified";
            $score4 = 20;
         }else{
             $res4 = "not";
             $score4 = 0;
         }if($getpost["frame2"] == $gettags["frame2"]){
            $res5 = "verified";
            $score5 = 20;
         }else{
             $res5 = "not";
             $score5 = 0;
         }
         $score = $score1+$score2+$score3+$score4+$score5;
         if($score == 0){
            $comment = "Absolutely not advisable, with zero compatibility.";
         }if(($score >= 0) && (($score < 20))){
            $comment = "Advised against due to a low rating.";
         }if(($score >= 20) && (($score < 50))){
            $comment = "Consider searching for a better profile as this one has an unsatisfactorily low rating.";
         }if(($score >= 50) && (($score < 70))){
            $comment = "Suggested for acceptance with a moderate rating.";
         }if(($score >= 70) && (($score < 100))){
            $comment = "Highly recommended for acceptance with a strong rating.";
         }if($score == 100){
            $comment = "Strongly endorsed for acceptance with a top rating - it's exactly what you need.";
         }
        return[$res1,$res2,$res3,$res4,$res5,$score,$comment];
    }else{
        $res1 = "not";
        $res2 = "not";
        $res3 = "not";
        $res4 = "not";
        $res5 = "not";
        $score = 0 ;
        $comment = "Absolutely not advisable, Profile not completed.";
        return[$res1,$res2,$res3,$res4,$res5,$score,$comment];
    }
}

}
