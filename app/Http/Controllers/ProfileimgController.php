<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Imgp;

class ProfileimgController extends Controller
{
    function uploadimg(Request $req)
    {
        $validate = Validator(
            ['file' => $req->file('file')],
            ['file' => ['required', 'image','mimes:jpeg,png,jpg','max:2048']]
        );
        if ( $validate->fails() ) {
            return["error","Image is not valid"];
        }else{
        $check = imgp::where('user',$req->id)->first();
        if(!$check){
        $imgp = new Imgp;
        $imgp->user = $req->id;
        $imgp->fileimg =  $req->file('file')->store('public/profileimg');
        $imgp->save();
        return ['success','Image saved successfully'];
        }else{
            $check->update([
                'fileimg' => $req->file('file')->store('public/profileimg') ,
            ]);
            return ['success','Image saved successfully'];
        }
    }
}
    function getimg(Request $req){
        $check = imgp::where('user',$req->id)->first();
        if($check){
        $img = $check["fileimg"];
        }else{
            $img = "storage/profileimg/default.png";
        }
        $img = str_replace('public/profileimg', 'storage/profileimg', $img);
        return $img;
    }
}
