<?php

namespace App\Http\Controllers;
use App\User;
use App\address;
use App\contacts;
use App\advertisment;
use App\Ad_Images;
use App\Images;

use App\Photo;
use File;

use Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
class ListingController extends Controller
{

    public function index(){
        //display only the approved adds
        $advertisments = Advertisment::with('user')->where('approved',true)->paginate(8);
        foreach($advertisments as $ads){
            $images = Ad_Images::where('advertisment_id',$ads->id)->get();
        }
        return view('pages.listing',compact('advertisments','images'));

      
    }
    public function indexs( $id){
       
        $advert = Advertisment::findOrFail($id);
        $user = User::findOrFail($advert->user_id);
        $image = Ad_Images::where('advertisment_id',$id)->get();
        $amenities = explode(',', $advert->amenity);
        return view('pages.view_listing',compact('advert','user','image','amenities'));
      
    }

    public function filter(Request $req){
        $search = $req->search;
        $price1 = $req->price1;
        $price2 = $req->price2;

        $advertisments = Advertisment::with('user')->where('street',$search)->paginate(2);
    if($req->search != null ){
        $advertisments = Advertisment::with('user')->where('street',$search)->paginate(2);
    }
    if($req->price1 != null && $req->price2 != null && $req->search !=null){
        $advertisments = Advertisment::with('user')->whereBetween('price', [$price1, $price2])->orWhere('street' , $search)->paginate(2);
    }
        return view('pages.listing',compact('advertisments'));
    }

    public function create(){
        if(auth()->user()){
            $user = auth()->user();
            return view('listing.create',compact('user'));
        }else{
            return view('welcome');
        }
        
    }

    public function edit_list($id){
        $user = auth()->user();
        $advert = Advertisment::findOrFail($id);
        $amenities = explode(',', $advert->amenity);
        // $user = User::findOrFail($advert->user_id);
        $image = Ad_Images::where('advertisment_id',$id)->get();
        return view('listing.edit_listing',compact('user','advert','image','amenities'));
    } 

    public function destroy($id)
    {
        $advert = Advertisment::findOrFail($id);
        $advert->delete();
        return back();
    }

    public function payment()
    {
        return response()->json(['status'=>"success"]);
    }

    // public function createForadmin(){
    //     return view('home.appointmentApplication');
    // }

    // stores the application then send a email copy to the admin and maybe user??
   
    protected function store(Request $req )
    {
        $this->validate($req, [
            'rooms' => ['required', 'string', 'max:255'],
            'bath_rooms' => ['required', 'string', 'max:255'],
            'kitchen_rooms' => ['required', 'string', 'max:255'],
            'parish' => ['required', 'string', 'max:255'],
            'apartment_number' => ['required', 'string',  'max:255'],
            'description' => ['required', 'string',  'max:255'],
            'street' => ['required', 'string',  'max:255'],  
            'email' => ['required', 'string', 'email', 'max:255'],
            // 'photo_name' => ['required', 'string',  'max:255'], 
            // 'photo_description' => ['required', 'string',  'max:255'], 
            // 'images' => 'string',
            'advert_id' => 'string',
            'advertisment_id' => 'integer',
            'user_id' => 'string',
            'price' =>['required', 'string'],
            'buildingtype' => ['required', 'string'],
            'contract' =>['required', 'string'],
            'phone_number' => ['required', 'string'],
            'amenity' => ['required'],
            'images' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $imageName ="sdfsdfsdfsdf";
        if($req->file('images')){
        $img = $req->file('images');

        //here we are geeting userid alogn with an image
        // $adid = $req->adid;
    
        $imageName = strtotime(now()).rand(11111,99999).'.'.$img->getClientOriginalExtension();
    
        $original_name = $img->getClientOriginalName();
        // $advertisments_image->image = $imageName;
    
        if(!is_dir(public_path() . '/uploads/images/')){
            mkdir(public_path() . '/uploads/images/', 0777, true);
        }
    
        $req->file('images')->move(public_path() . '/uploads/images/', $imageName); 
    }

try{
    

    auth()->user()->advertisments()->create([
    // $advertisments = new Advertisment;
    'rooms' => $req->rooms,
    'bath_rooms' => $req->bath_rooms,
    'kitchen_rooms' => $req->kitchen_rooms,
    'parish' => $req->parish,
    'apartment_number' =>  $req->apartment_number,
    'description' => $req->description,
    'street' => $req->street,
    // 'photo_name' => $req->photo_name,
    // 'photo_description' =>$req->photo_description, 
    'price' => $req->price, 
    'email'=> $req->email,
    'buildingtype' => $req->buildingtype,
    'contract' => $req->contract,
    'phone_number' => $req->phone_number,
    // $advertisments->user_id = Auth::user()->id;
    
    'images' => '/uploads/images/'.$imageName,
    'amenity' => implode(",", $req->amenity),
    ]);
    // $advertisments->save();
    $ad_id = DB::getPdo()->lastInsertId(); ;

    }catch (\Exception $e) {
        return response()->json(['status'=>'exception', 'msg'=>$e->getMessage()]);
    }
    // // $this->storeimage($advertisments);
    return response()->json(['status'=>"success",'ad_id'=>$ad_id,'image_name' =>$imageName]);
    }


   protected function storeImage(Request $request)
    {
        if($request->file('file')){

            $img = $request->file('file');

            //here we are geeting userid alogn with an image
            $adid = $request->adid;

            $imageName = strtotime(now()).rand(11111,99999).'.'.$img->getClientOriginalExtension();
       
            $original_name = $img->getClientOriginalName();
            // $advertisments_image->image = $imageName;

            if(!is_dir(public_path() . '/uploads/images/')){
                mkdir(public_path() . '/uploads/images/', 0777, true);
            }

        $request->file('file')->move(public_path() . '/uploads/images/', $imageName);
        // we are updating our image column with the help of user id
         
    
            $adimage = new Advertisment;
            $adimage->Ad_Images()->create([
                'images' => '/uploads/images/'.$imageName,
                'advert_id' => $adid,
                'user_id' =>  Auth::user()->id,
                'advertisment_id' => $adid,
                
            ]);
            // = '/uploads/images/'.$imageName;
            // $adimage->user_id =  Auth::user()->id;
            // $adimage->advertisment_id =  $adid;
        return response()->json(['status'=>"success",'imgdata'=>$original_name,'userid'=>$adid, '$imageName'=>$imageName]);
        }
    }

    public function destroyimg(Request $request)
    {
        $filename =  $request->get('filename');
        Ad_Images::where('images',$filename)->delete();
        $path=public_path('/uploads/images/').$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;  
    }

    // public function approve_recruiter($id)
    // {
    //     $rec = Recruiter::FindOrFail($id);
    //     $rec->approved = true;
    //     $rec->save();
    //     return redirect()->route("recruiters.manage")
    //         ->with('message', $rec->company_name . ' approved');
    // }

    public function userFetchList() {
        $userdetail =DB::table('users')
        ->join('advertisments', function ($join) {
            $join->on('users.id', '=', 'advertisments.user_id')
                 ->where('advertisments.approved', '=', false);
        })
        ->get();
        
      return response()->json($userdetail);  
    }



    public function allAdvertisments(){
        $userdetail =DB::table('users')
        ->join('advertisments', function ($join) {
            $join->on('users.id', '=', 'advertisments.user_id')
                 ->where('advertisments.approved', '=', true);
        })
        ->get();
        
      return response()->json($userdetail); 
    }

    public function approve_ad(Request $request)
    {   
        $messages;
        $ad_id = $request->adid;
        $approval = $request ->approved;
        $ad = advertisment::FindOrFail($ad_id );
        $ad->approved = true;
        $ad->save();

        $userdetail =DB::table('users')
        ->join('advertisments', function ($join) {
            $join->on('users.id', '=', 'advertisments.user_id')
                 ->where('advertisments.approved', '=', false);
        })
        ->paginate(2);

        switch ($approval) {
            case false:
              $messages = "Disabled Advertisment Successful";
              break;
            case true:
                $messages = "Advertisment Successfully Approved";
              break;
    
            default:
            $messages = "There was A Error";
          } 

        return response()->json(['status'=>"success", 'userdetails'=>$userdetail]);
    }

   

//    public function getDateTime(){
//        $appointment= Appointments::all();
//        if($appointment){
//            $appointment = Appointments::orderby('time','asc')->select('*')->get();
//        }
//        // Fetch all records
//        $userData['data'] = $appointment;
//        return $userData;
//        exit;
//    }

    //shows the clicked event
    // public function show(Appointments $appointments, Request $request)
    // {
    //     return view('home.show', compact('appointments'));
    // }

    //allows editing
    // public function edit(Appointments $appointments)
    // {
    //     return view('home.edit', compact('appointments'));
    // }

    //update the files
    // public function update(Appointments $appointments)
    // {
    //     // $appointments->update($this->validateRequest());
    //     // return redirect('appointments/' . $appointments->id);
    // }

    // this simply deletes all the items
   
    // validate fields



    public function store_edit(Request $req, $id){
        $this->validate($req, [
            'rooms' => ['required', 'string', 'max:255'],
            'bath_rooms' => ['required', 'string', 'max:255'],
            'kitchen_rooms' => ['required', 'string', 'max:255'],
            'parish' => ['required', 'string', 'max:255'],
            'apartment_number' => ['required', 'string',  'max:255'],
            'description' => ['required', 'string',  'max:255'],
            'street' => ['required', 'string',  'max:255'],  
            'email' => ['required', 'string', 'email', 'max:255'],
            // 'photo_name' => ['required', 'string',  'max:255'], 
            // 'photo_description' => ['required', 'string',  'max:255'], 
            // 'images' => 'string',
          
            'advertisment_id' => 'integer',
            'user_id' => 'string',
            'price' =>['required', 'string'],
            'buildingtype' => ['required', 'string'],
            'contract' =>['required', 'string'],
            'phone_number' => ['required', 'string'],
            'amenity' => ['required'],
            'images' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if($req->file('images')){
        $img = $req->file('images');

        //here we are geeting userid alogn with an image
        // $adid = $req->adid;
    
        $imageName = '/uploads/images/'. strtotime(now()).rand(11111,99999).'.'.$img->getClientOriginalExtension();
    
        $original_name = $img->getClientOriginalName();
        // $advertisments_image->image = $imageName;
    
        if(!is_dir(public_path() . '/uploads/images/')){
            mkdir(public_path() . '/uploads/images/', 0777, true);
        }
        // $image_path = "/uploads/images/filename.ext";  // Value is not URL but directory file path
        // if(File::exists($image_path)) {
        //     File::delete($image_path);
        // }
        $req->file('images')->move(public_path() . '/uploads/images/', $imageName); 
    }else{
        $add_image =  Advertisment::find($req->add_id);
        $imageName = $add_image->images;
    }

  
    

try{
    $ad = advertisment::FindOrFail($id );

    $ad ->update([
    // $advertisments = new Advertisment;
    'rooms' => $req->rooms,
    'bath_rooms' => $req->bath_rooms,
    'kitchen_rooms' => $req->kitchen_rooms,
    'parish' => $req->parish,
    'apartment_number' =>  $req->apartment_number,
    'description' => $req->description,
    'street' => $req->street,
    // 'photo_name' => $req->photo_name,
    // 'photo_description' =>$req->photo_description, 
    'price' => $req->price, 
    'email'=> $req->email,
    'buildingtype' => $req->buildingtype,
    'contract' => $req->contract,
    'phone_number' => $req->phone_number,
    // $advertisments->user_id = Auth::user()->id;
    'images' => $imageName,
    'amenity' => implode(",",$req->amenity),
    ]);
    // $advertisments->save();
   
 

    }catch (\Exception $e) {
        return response()->json(['status'=>'exception', 'msg'=>$e->getMessage()]);
    }
    // // $this->storeimage($advertisments);
    return response()->json(['status'=>"success",'ad_id'=>$id]);
    }


    public function imageApi(Request $req){
        $ad_id = $req->adi;
        $images = Ad_Images::where('advertisment_id',$ad_id)->get();;
        $advert = Advertisment::findOrFail($ad_id);
        $imagelocation = $advert->images;
     
	foreach($images as $image){
        $tableImages[] = $image['images'];
        $obj['name'] = $image['images'];
			$obj['size'] = "0.4mb";          
			$obj['path'] = $image['images'];
			$data[] = $obj;
	}

  return response()->json(['datas'=>$data,'imageloca'=>$imagelocation]);
        // return response()->json($image);
    }

 
    public function deleteFile(Request $req){
        $filename = $req->filename;
        return response()->json( $filename);
    }

    
    private function validateRequest(){
        return request()->validate([
            // 'first_name' => 'nullable|min:3',
            // 'email' => 'nullable|email',
            // 'last_name' =>'nullable',
            // 'phone_number' =>'nullable',
            // 'phone_number2' =>'nullable',
            // 'address'=>'nullable',
            // 'zip_code'=>'nullable',
            // 'city'=>'nullable',
            // 'state'=>'nullable',
            // 'time'=>'nullable',
            // 'summary'=>'nullable'
        ]);
    }
}
