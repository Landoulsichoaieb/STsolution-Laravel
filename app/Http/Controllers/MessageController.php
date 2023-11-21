<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timeline;
use App\Models\Message;

class MessageController extends Controller
{
    function sendmessage(Request $req){
        $status= 0;
        $line = Timeline::find($req->id);
        $message = new Message;
        $message->sender = $req->sender;
        $message->user = $line->user;
        $message->company = $line->company;
        $message->timeline = $req->id;
        $message->message = $req->message;
        $message->status = $status;
        $message->save();
        return ['success','Successfully sent'];
    }
    function getmessage(Request $req){
        $getmessage = \DB::table('message')
    ->join('users', 'message.sender', '=', 'users.id')
    ->where('message.timeline', $req->id)
    ->select('message.*','users.*')
    ->orderBy('message.id', 'desc')
    ->get();
        return($getmessage);
    }
}
