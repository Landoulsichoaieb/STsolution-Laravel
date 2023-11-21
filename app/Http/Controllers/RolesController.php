<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;

class RolesController extends Controller
{
    function role(Request $req){
        $check = Roles::where("user",$req->id)->first();
        if($check){
            return["error","Some thing went wrong"];
        }else{
            $role = new Roles;
            $role->user = $req->id;
            $role->role = $req->role;
            $role->save();
            return["success","Successfully Done"];
        }
    }
    function getrole(Request $req){
        $check = Roles::where("user",$req->id)->first();
        if($check){
            return "false";
        }else{
            return "true";
        }
    }
}
