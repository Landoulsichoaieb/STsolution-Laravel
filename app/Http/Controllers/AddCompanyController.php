<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;
use App\Models\AddCompany;
use App\Models\User;

class AddCompanyController extends Controller
{
    function addcompany(Request $req){
        $roles = Roles::where("user",$req->id)->first();
        if(!$roles){
            $comp = new Addcompany;
            $comp->user = $req->id;
            $comp->address = $req->input('address');
            $comp->field = $req->input('compfield');
            $comp->save();
            $rolenbr = 2 ;
            $rolecomp = new Roles;
            $rolecomp->user = $req->id;
            $rolecomp->role = $rolenbr;
            $rolecomp->save();
            return["success","Company saved successfully"];
        }
    }

    function getcompany(){
        $allcomp = \DB::table('users')
    ->join('company', 'company.user', '=', 'users.id')
    ->join('imgp', 'users.id', '=', 'imgp.user')
    ->select('company.*', 'users.*', \DB::raw("REPLACE(imgp.fileimg, 'public/profileimg', 'storage/profileimg') as fileimg"))
    ->inRandomOrder()
    ->limit(3)
    ->get();
    return $allcomp;
    }
    function getcompanysolo(Request $req){
        $companysolo = Addcompany::where('user',$req->id)->first();
        return $companysolo;
    }
}
