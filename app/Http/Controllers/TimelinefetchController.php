<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timeline;
use App\Models\Timelinefetch;
class TimelinefetchController extends Controller
{
    function schedule(Request $req){
        $title = "schedule meeting";
        $description = "Meeting arranged by the company.";
        $type="meeting";
        $status= 0;
        $line = Timeline::find($req->id);
        $timeline = new Timelinefetch;
        $timeline->user = $line->company;
        $timeline->timeline = $req->id;
        $timeline->title = $title;
        $timeline->description = $description;
        $timeline->type = $type;
        $timeline->datemeeting = $req->date;
        $timeline->status = $status;
        $timeline->save();
        return ['success','Meeting arranged'];
    }
    function feedback(Request $req){
        $feedback = Timelinefetch::where('timeline',$req->id)->orderBy('id', 'desc')->get();
        return($feedback);
    }
    function requestmeet(Request $req){
        $status= 0;
        $date = "none";
        $title = $req->thetype;
        $type = $req->thetype;
        $line = Timeline::find($req->id);
        $timeline = new Timelinefetch;
        $timeline->user = $line->user;
        $timeline->timeline = $req->id;
        $timeline->title = $title;
        $timeline->description = $req->requestmeeting;
        $timeline->type = $type;
        $timeline->datemeeting = $date;
        $timeline->status = $status;
        $timeline->save();
        return ['success','Successfully Added to Timeline'];
    }
}
