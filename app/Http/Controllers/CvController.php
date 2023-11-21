<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Cv;

class CvController extends Controller
{
    function uploadcv(Request $req)
    {
        $validate = Validator(
            ['file' => $req->file('file')],
            ['file' => ['required','mimes:pdf,docx','max:2048']]
        );
        if ( $validate->fails() ) {
            return["error","File is not valid"];
        }else{
        $check = Cv::where('user',$req->id)->first();
        if(!$check){
        $cv = new Cv;
        $cv->user = $req->id;
        $cv->cv =  $req->file('file')->store('public/cvs');
        $cv->save();
        return ['success','File saved successfully'];
        }else{
            $check->update([
                'cv' => $req->file('file')->store('public/cvs') ,
            ]);
            return ['success','File saved successfully'];
        }
    }
}

function getcv(Request $req){
    $check = Cv::where('user',$req->id)->first();
    $cv = $check["cv"];
    $cv = str_replace('public/cvs', 'storage/cvs', $cv);
    return ($cv);
}
}
