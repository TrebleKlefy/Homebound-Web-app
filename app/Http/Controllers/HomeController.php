<?php

namespace App\Http\Controllers;



use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\User;
use App\address;
use App\contacts;
use App\advertisment;
use App\Profile;
use App\Ad_Images;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {    $user= auth()->user();
    //     return view('profiles.index' ,compact('user'));
    // }

    public function advertApi(){
        $userdetail =DB::table('users')
        ->join('advertisments', function ($join) {
            $join->on('users.id', '=', 'advertisments.user_id')
                 ->where('advertisments.approved', '=', false);
        })
        ->get();
        
        return response()->json(['status'=>"messages", 'userdetails'=>$userdetail]);
    }

    public function adminHome()

    {
        $user= auth()->user();
        $userdetail =DB::table('users')
        ->join('advertisments', function ($join) {
            $join->on('users.id', '=', 'advertisments.user_id')
                 ->where('advertisments.approved', '=', false);
        })
        ->paginate(2);
        //display only the approved adds
        if(Advertisment::all()->count() > 0){
        $advertisment = Advertisment::with('user')->where('approved',false)->paginate(2);
        }
        
        return view('admin.index', compact('user','advertisment','userdetail'));

    }

    public function editprofile(user $user){
        return view('admin.editprofile',compact('user'));
    }

    public function adminprofile(user $user){
        return view('admin.show_profile',compact('user'));
        // return view('admin.editprofile',compact('user'));
    }

    public function all_advert(){
        $user= auth()->user();
        return view('admin.ad_tables',compact('user'));
    }

    public function testdata(){
        return User::find(1)->advertisments;
    }


    
}
