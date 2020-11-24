<?php

namespace App\Http\Controllers;
use App\User;
use App\address;
use App\contacts;
use App\advertisment;
use App\Ad_Images;
use App\Images;
use App\payment;
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

    public function filter(Request $req){
    $search = $req->search;
    $price1 = $req->price1;
    $price2 = $req->price2;

    $advertisments = Advertisment::with('user')->where('street',$search)->get();
    if($req->search != null ){
    $advertisments = Advertisment::with('user')->where('street',$search)->get();
    }
    if($req->price1 != null && $req->price2 != null && $req->search !=null){
    $advertisments = Advertisment::with('user')->whereBetween('price', [$price1, $price2])->orWhere('street' , $search)->get();
    }
    return response()->json(['status'=>"success", 'advertisments'=>$advertisments]);

}

public function userNotification($id){
    $user = User::findOrFail($id);
    $notifications = array();

    foreach ($user->unreadNotifications as $notification) {
        array_push($notifications,$notification);
    }

 return response()->json(['notification' => $notifications]);
}





public function index(){
    //display only the approved adds
    $advertisments = Advertisment::with('user')->where('approved',true)->get();
    $image = Ad_Images::all();
    $imagearray = array();
    foreach($image as $im){
    foreach($advertisments as $ads){

        $images = Ad_Images::where('advertisment_id','=',$ads->id)->get();
        array_push($imagearray,$images);
        }
    }
    return response()->json(['advertisments'=>$advertisments, 'images'=>$imagearray]);
}

public function user(User $user)
{

   $adds = DB::table('users')
   ->join('advertisments', 'users.id','=','advertisments.user_id')->get();
   return response()->json([$adds]);
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
