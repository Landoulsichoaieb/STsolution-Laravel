<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Searchtags;

class SearchtagsController extends Controller
{
    function gettags(Request $req){
        $tags = Searchtags::where("typetag",$req->id)->get();
        return $tags;
    }

}
