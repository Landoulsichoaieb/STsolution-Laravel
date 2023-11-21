<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Destext;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function register(Request $req){
        $user = User::where('email',$req->input('email'))->first();
        if(!$user){
            $validate = Validator(
                ['email' => $req->input('email')],
                ['email' => ['required', 'email']]
            );
            if ( $validate->fails() ) {
                return["error","Email is not valid"];
            }else{
            $validator = Validator(
                ['password' => $req->input('password')],
                ['password' => ['required', 'min:8']]
            );
            if ( $validator->fails() ) {
                return["error","Password is too short, minimum 8 characters password"];
            }else{
        $user = new User;
        $user->name = $req->input('name');
        $user->email = $req->input('email');
        $user->password = Hash::make($req->input('password'));
        $user->save();
        return $user;
            }
        }
        }else{
            return["error","Email already exists"];
        }
    }
    function login(Request $req){


        $credentials = $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {

            $user = Auth::user();
            return $user;
        }else{
            return["error","Email or password is not matched"];
        }



    }

    function updatepassword(Request $req){
        $valid = Validator(
            ['current' => $req->input('current')],
            ['current' => ['required']],
            ['password' => $req->input('password')],
            ['password' => ['required', 'min:8']],
            ['repeatpassword' => $req->input('repeatpassword')],
            ['repeatpassword' => ['required', 'min:8']]
        );

        if ( $valid->fails() ) {
            return["error","Something went wrong please Try again."];
        }else{
            $user = User::where('id',$req->id)->first();

            if(!Hash::check($req->current,$user->password)){
                return["error","Current password is wrong."];
            }else{
                $user->update([
                    'password' => Hash::make($req->password),
                ]);
                return["success","Password updated successfully"];
            }

        }
    }

    function getuser(Request $req){
        $Profuser = User::where("id",$req->id)->first();
        return $Profuser;
    }

    function searchzone(Request $req){
       /* $searchall = User::where("name","LIKE","%".$req->key."%")->get();*/
       $searchall = \DB::table('users')
    ->join('destext', 'users.id', '=', 'destext.user')
    ->join('imgp', 'users.id', '=', 'imgp.user')
    ->where("users.name","LIKE","%".$req->key."%")
    ->select('users.id','users.name', 'destext.description', \DB::raw("REPLACE(imgp.fileimg, 'public/profileimg', 'storage/profileimg') as fileimg"))
    ->get();
        return $searchall;
    }

}
