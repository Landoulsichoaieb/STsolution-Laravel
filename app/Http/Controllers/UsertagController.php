<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usertag;

class UsertagController extends Controller
{
    function getusertag(Request $req){
        $getutag = Usertag::where("user",$req->id)->first();
        return $getutag;
    }
    function edittag(Request $req){

        $checktag = Usertag::where("user",$req->id)->first();
        if($checktag){
            if(!empty($req->input("myfield"))){
            if(($req->tag) == 1){
                $checktag->update([
                    'myfield' => $req->input("myfield") ,
                ]);
                return ["success","Field Successfully Updated"];
            }elseif(($req->tag) == 2){
                $checktag->update([
                    'prog1' => $req->input("myfield") ,
                ]);
                return ["success","Programming Language Updated Successfully"];
            }elseif(($req->tag) == 3){
                $checktag->update([
                    'prog2' => $req->input("myfield") ,
                ]);
                return ["success","Programming Language Updated Successfully"];
            }elseif(($req->tag) == 4){
                $checktag->update([
                    'frame1' => $req->input("myfield") ,
                ]);
                return ["success","Framework Updated Successfully"];
            }elseif(($req->tag) == 5){
                $checktag->update([
                    'frame2' => $req->input("myfield") ,
                ]);
                return ["success","Framework Updated Successfully"];
            }else{
                return ["error","Something wrong happened"];
            }}else{
                return["error","You need to select a value"];
            }

        }else{
            if(($req->tag) == 1){
                $usertag = new Usertag;
                $usertag->user = $req->id;
                $usertag->myfield = $req->input("myfield");
                $usertag->prog1 = "";
                $usertag->prog2 = "";
                $usertag->frame1 = "";
                $usertag->frame2 = "";
                $usertag->save();
                return ["success","Field Updated Successfully"];
            }elseif(($req->tag) == 2){
                $usertag = new Usertag;
                $usertag->user = $req->id;
                $usertag->myfield = "";
                $usertag->prog1 = $req->input("myfield");
                $usertag->prog2 = "";
                $usertag->frame1 = "";
                $usertag->frame2 = "";
                $usertag->save();
                return ["success","Programming Language Updated Successfully"];
            }elseif(($req->tag) == 3){
                $usertag = new Usertag;
                $usertag->user = $req->id;
                $usertag->myfield = "";
                $usertag->prog1 = "";
                $usertag->prog2 = $req->input("myfield");
                $usertag->frame1 = "";
                $usertag->frame2 = "";
                $usertag->save();
                return ["success","Programming Language Updated Successfully"];
            }elseif(($req->tag) == 4){
                $usertag = new Usertag;
                $usertag->user = $req->id;
                $usertag->myfield = "";
                $usertag->prog1 = "";
                $usertag->prog2 = "";
                $usertag->frame1 = $req->input("myfield");
                $usertag->frame2 = "";
                $usertag->save();
                return ["success","Framework Updated Successfully"];
            }elseif(($req->tag) == 5){
                $usertag = new Usertag;
                $usertag->user = $req->id;
                $usertag->myfield = "";
                $usertag->prog1 = "";
                $usertag->prog2 = "";
                $usertag->frame1 = "";
                $usertag->frame2 = $req->input("myfield");
                $usertag->save();
                return ["success","Framework Updated Successfully"];
            }else{
                return ["error","Something wrong happened"];
            }
        }
    }
}
