<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phonenbr;

class PhonenbrController extends Controller
{
    function editphone(Request $req){
        $valid = Validator(
            ['phonenbr' => $req->input('phonenbr')],
            ['phonenbr' => ['required', 'min:6', 'max:30']],
        );
        if ( $valid->fails() ) {
            return["error","Minimum 6 characters required and maximum is 30 characters."];
        }else{
            $check = Phonenbr::where('user',$req->id)->first();
        if(!$check){
            $desc = new Phonenbr;
            $desc->user = $req->id;
            $desc->phonenbr = $req->input('phonenbr');
            $desc->save();
            return ['success','Phone saved successfully'];
        }else{
            $check->update([
                'phonenbr' => $req->input('phonenbr') ,
            ]);
            return ['success','Phone updated successfully'];
        }
    }
    }
    function getphone(Request $req){
        $check = Phonenbr::where('user',$req->id)->first();
        if($check){
            return $check["phonenbr"];
        }
    }
}
