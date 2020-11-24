<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\User;
use App\address;
use App\contacts;
use Notification;
use App\Notifications\InvoicePaid;

use App\Notifications\Contactus;

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
        return view('mail.read',compact('user','notification'));
    }

    public function contactuser(Request $req, $id)
    {
        try{
        $user = User::findOrFail($id);
        $this->validate($req, [
          
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'message' => ['required',   'max:255'],  
          
        ]);
   

     
    }catch (\Exception $e) {
        return response()->json(['status'=>'exception', 'msg'=>$e->getMessage()]);
    }        

    $details = [
        'name' => $req->name,
        'greeting' => 'Message from ' . $req->name,
        'body' => $req->message,
        'thanks' => 'Thank you for chosing homebound! You can reply to ' .$req->name .' by email ' . $req->email,
    ];
        Notification::send($user, new Contactus($details));

        return response()->json(['message'=>'success','id'=>$id]);
    }

   

}
