<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Destext;

class DestextController extends Controller
{
    function editdesc(Request $req){
        $valid = Validator(
            ['description' => $req->input('description')],
            ['description' => ['required', 'min:45', 'max:255']],
        );
        if ( $valid->fails() ) {
            return["error","Minimum 45 characters required and maximum is 255 characters."];
        }else{
            $check = Destext::where('user',$req->id)->first();
        if(!$check){
            $desc = new Destext;
            $desc->user = $req->id;
            $desc->description = $req->input('description');
            $desc->save();
            return ['success','Description saved successfully'];
        }else{
            $check->update([
                'description' => $req->input('description') ,
            ]);
            return ['success','Description updated successfully'];
        }
    }
    }
    function getdesc(Request $req){
        $check = Destext::where('user',$req->id)->first();
        if($check){
            return $check["description"];
        }else{
            return ("&#@+-|è\çà#²é=)à(&");
        }
    }
}
