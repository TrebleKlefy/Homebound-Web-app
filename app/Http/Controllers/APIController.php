<?php

namespace App\Http\Controllers;
use App\User;
use App\address;
use App\contacts;
use App\advertisment;
use App\Ad_Images;
use App\Images;
use App\payment;
use App\Reviews;
use Notification;
use App\Notifications\InvoicePaid;

use App\Photo;
use File;

use Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class APIController extends Controller
{



// returns all the user notifications
public function userNotification($id){
    $user = User::findOrFail($id);
    $notifications = array();

    foreach ($user->unreadNotifications as $notification) {
        array_push($notifications,$notification);
    }

 return response()->json(['notification' => $notifications]);
}


//mark viewed notifications as viewed
public function readInbox($nid,$uid){
    $user = User::findOrFail($uid);
    $user->Notifications->find($nid)->markAsRead();
    return response()->json(['status' => 'success']);
}


//sends advertisements to app
public function index(){
    //display only the approved adds
    $imagearray = array();
    $advertisments = Advertisment::with('user')->where('approved',true)->get();

    foreach($advertisments as $ads){
        $image = Ad_Images::where('advertisment_id','=',$ads->id)->get();
        array_push($imagearray,$image);
    }
    return response()->json(['advertisments'=>$advertisments, 'images'=>$imagearray]);
}

//filter for listing  in app
public function filter(Request $req)
    {

    $imagearray = array();
    $advertisments = Advertisment::with('user')->where('street',$req->search)->where('approved',true)->get();

    foreach($advertisments as $ads){
        $image = Ad_Images::where('advertisment_id','=',$ads->id)->get();
        array_push($imagearray,$image);
    }

    return response()->json(['advertisments'=>$advertisments, 'images'=>$imagearray]);

    }


//returns user info for app when logged in
public function user(User $user)
{

   $adds = DB::table('users')
   ->join('advertisments', 'users.id','=','advertisments.user_id')->get();

   return response()->json([$adds]);
}

public function reviewcounter(User $user){
    $addscount = DB::table('users')
    ->join('advertisments', 'users.id','=','advertisments.user_id')->count();
    $review =DB::table('advertisments')->join('reviews', 'advertisments.id','=','reviews.advertisment_id')->count();

    return response()->json(['review'=>$review,'addcount'=>$addscount]);
}

public function userFetchList() {
    $userdetail =DB::table('users')
    ->join('advertisments', function ($join) {
        $join->on('users.id', '=', 'advertisments.user_id')
             ->where('advertisments.approved', '=', false);
    })
    ->get();

  return response()->json($userdetail);
}

}
