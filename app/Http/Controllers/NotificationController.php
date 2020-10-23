<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;




class NotificationController extends Controller
{
    public function getUserNotification($nid, $uid)
    {
        $user = auth()->user();
        $notification = $user->Notifications->find($nid);
        $user->Notifications->find($nid)->markAsRead();

        return $notification;
    }


    public function DeleteNotification($id)
    {
        $response = DB::table("notifications")->where("id", $id)->delete();
        return response()->json(['response' => $response], $status = 200);
    }

    public function mailbox(){
        $user = auth()->user();
       
        // $user->Notifications->find($nid)->markAsRead();
        return view('mail.inbox',compact('user'));
    }

    public function readInbox($nid){
        $user = auth()->user();
        $notification = $user->Notifications->find($nid);
        $user->Notifications->find($nid)->markAsRead();
        // $notification = $user->Notifications->get();
        // $user->Notifications->find($nid)->markAsRead();
        return view('mail.read',compact('user'));
    }
}
