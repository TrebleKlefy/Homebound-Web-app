<?php

namespace App\Http\Controllers;
use App\User;
use App\address;
use App\contacts;
use App\advertisment;
use App\Ad_Images;
use App\Reviews;
use App\Images;
use App\payment;
use Notification;
use App\Notifications\InvoicePaid;

use App\Photo;
use File;
// use Image;
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

    //for viewing more details on the listing
    public function indexs( $id){

        $advert = Advertisment::findOrFail($id);
        $user = User::findOrFail($advert->user_id);
        $image = Ad_Images::where('advertisment_id',$id)->get();
        $amenities = explode(',', $advert->amenity);
        $review = Reviews::where('advertisment_id',$id)->get();
        return view('pages.view_listing',compact('advert','user','image','amenities','review'));

    }

    // filter listing from the listing page
    public function filter(Request $req){
        $search = $req->search;
        $price1 = $req->price1;
        $price2 = $req->price2;
         $count =0;
        $advertisments = Advertisment::with('user')->where('street',$search)->where('approved',true)->paginate(8);
    if($req->search != null ){
        $advertisments = Advertisment::with('user')->where('street',$search)->where('approved',true)->paginate(8);
    }
    if($req->price1 != null && $req->price2 != null && $req->search !=null){
        $advertisments = Advertisment::with('user')->whereBetween('price', [$price1, $price2])->orWhere('street' , $search)->where('approved',true)->paginate(8);
    }
    foreach ($advertisments as $ads){
        $count++;
    }

    if($count>0){
    return view('pages.listing',compact('advertisments'));
    }else{
        return view('pages.listing')->with('advertisments', $advertisments)->with('message', 'No data Found please try searching for another!');
    }
    }

    // filter listing from the homepage
    public function searcFilter(Request $req)
    {
        $count=0;
        $advertisments = Advertisment::with('user')->where('street',$req->search)->where('approved',true)->paginate(10);
        foreach ($advertisments as $ads){
            $count++;
        }
        if($count>0){
        return view('pages.listing',compact('advertisments'));
        }else{
            return view('pages.listing')->with('advertisments', $advertisments)->with('message', 'No data Found please try searching for another!');
        }
    }

    //create an listing
    public function create(){
        if(auth()->user()){
            $user = auth()->user();
            return view('listing.create',compact('user'));
        }else{
            return view('welcome');
        }

    }

    // this is used to edi tht amenities
    public function edit_list($id){
        $user = auth()->user();
        $advert = Advertisment::findOrFail($id);
        $amenities = explode(',', $advert->amenity);
        $image = Ad_Images::where('advertisment_id',$id)->get();
        return view('listing.edit_listing',compact('user','advert','image','amenities'));
    }

    //delete an add
    public function destroy($id)
    {
        $advert = Advertisment::findOrFail($id);
        $advert->delete();
        return back();
    }

    public function payment(Request $req)
    {
        payment::create($this->validateRequest());
       $this->sendNotification($req->amount);
        $pay_id = DB::getPdo()->lastInsertId();
        return response()->json(['status'=>"success",'pay_id'=>$pay_id,'amount'=>$req->amount]);
    }

    // stores the application then send a email??
    protected function store(Request $req )
    {
        $feature = '0';
        $this->validate($req, [
            'rooms' => ['required', 'string', 'max:255'],
            'bath_rooms' => ['required', 'string', 'max:255'],
            'kitchen_rooms' => ['required', 'string', 'max:255'],
            'parish' => ['required', 'string', 'max:255'],
            'apartment_number' => ['required', 'string',  'max:255'],
            'description' => ['required', 'string',  'max:255'],
            'street' => ['required', 'string',  'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'advert_id' => 'string',
            'advertisment_id' => 'integer',
            'user_id' => 'string',
            'price' =>['required', 'string'],
            'buildingtype' => ['required', 'string'],
            'contract' =>['required', 'string'],
            'phone_number' => ['required', 'string'],
            'amenity' => ['required'],
            'street2' => ['required', 'string'],
            'images' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if($req->file('images')){
        $img = $req->file('images');
        $imageName = strtotime(now()).rand(11111,99999).'.'.$img->getClientOriginalExtension();
        $this->imageStore($req, $imageName );

    }

    if($req->payments=='1500.00'){
       $feature = '1';
    }

try{

    auth()->user()->advertisments()->create([

    'rooms' => $req->rooms,
    'bath_rooms' => $req->bath_rooms,
    'kitchen_rooms' => $req->kitchen_rooms,
    'parish' => $req->parish,
    'apartment_number' =>  $req->apartment_number,
    'name' => $req->title,
    'description' => $req->description,
    'street' => $req->street,
    'street2' => $req->street2,
    'price' => $req->price,
    'email'=> $req->email,
    'buildingtype' => $req->buildingtype,
    'contract' => $req->contract,
    'phone_number' => $req->phone_number,
    'photo_name' => '/uploads/images/thumbnail/'.$imageName,
    'images' => '/uploads/images/'.$imageName,
    'amenity' => implode(",", $req->amenity),
    'feature' => $feature,
    ]);

    $ad_id = DB::getPdo()->lastInsertId();
     $this->imageResize($ad_id);

    }catch (\Exception $e) {
        return response()->json(['status'=>'exception', 'msg'=>$e->getMessage()]);
    }

    return response()->json(['status'=>"success",'ad_id'=>$ad_id,'image_name' =>$imageName]);
    }



    private function copyIMage($imageName){
        File::copy(public_path('/uploads/images/'.$imageName), public_path('/uploads/images/thumbnail/'.$imageName));
    }
    private function imageResize($id)
    {
        $image = Advertisment::findOrFail($id);
        $imageresized = Image::make(public_path() . $image->photo_name)->fit(150,150);
        $imageresized->save();
    }

//used to store image to a set location. this is caled by other functions
    protected function imageStore(Request $req, $imageName ){


        if(!is_dir(public_path() . '/uploads/images/')){
            mkdir(public_path() . '/uploads/images/', 0777, true);
        }

        $req->file('images')->move(public_path() . '/uploads/images/', $imageName);
        File::copy(public_path('/uploads/images/'.$imageName), public_path('/uploads/images/thumbnail/'.$imageName));

    }

    // store an a image or images for listing
   protected function storeImage(Request $req)
    {
        if($req->file('images')){

            $img = $req->file('images');
            $adid = $req->adid;
            $imageName = strtotime(now()).rand(11111,99999).'.'.$img->getClientOriginalExtension();
            $original_name = $img->getClientOriginalName();

            $this->imageStore($req, $imageName );


            $adimage = new Advertisment;
            $adimage->Ad_Images()->create([
                'images' => '/uploads/images/'.$imageName,
                'thumbnailimages'=> '/uploads/images/thumbnail/'.$imageName,
                'advert_id' => $adid,
                'user_id' =>  Auth::user()->id,
                'advertisment_id' => $adid,

            ]);
        $this->AvertImageResize($adid);
        return redirect()->back()->with('message', 'Successfull update!');
        }
    }

    public function returning()
    {
        return redirect()->back()->with('message', 'Successfull update!');
    }



    private function AvertImageResize($id)
    {
        $image = Ad_Images::where('advertisment_id',$id)->get();
        foreach($image as $images){
            $imageresized = Image::make(public_path() .   $images->thumbnailimages)->fit(250,250);
            $imageresized->save();
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

    public function userFetchList() {
        $userdetail =DB::table('users')
        ->join('advertisments', function ($join) {
            $join->on('users.id', '=', 'advertisments.user_id')
                 ->where('advertisments.approved', '=', false);
        })
        ->get();

      return response()->json($userdetail);
    }


// returns all advertisements
    public function allAdvertisments(){
        $userdetail =DB::table('users')
        ->join('advertisments', function ($join) {
            $join->on('users.id', '=', 'advertisments.user_id')
                 ->where('advertisments.approved', '=', true);
        })
        ->get();

      return response()->json($userdetail);
    }

    // approve advertisements for display by admin
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


    // edit listings
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
        $imageName = '/uploads/images/'. strtotime(now()).rand(11111,99999).'.'.$img->getClientOriginalExtension();
        $this->imageStore($req, $imageName );
        $this->copyIMage($imageName);

    }else{
        $add_image =  Advertisment::find($req->add_id);
        $imageName = $add_image->images;
    }




try{
    $ad = advertisment::FindOrFail($id );

    $ad ->update([

    'rooms' => $req->rooms,
    'bath_rooms' => $req->bath_rooms,
    'kitchen_rooms' => $req->kitchen_rooms,
    'parish' => $req->parish,
    'apartment_number' =>  $req->apartment_number,
    'description' => $req->description,
    'street' => $req->street,

    'price' => $req->price,
    'email'=> $req->email,
    'buildingtype' => $req->buildingtype,
    'contract' => $req->contract,
    'phone_number' => $req->phone_number,

    'images' => $imageName,
    'amenity' => implode(",",$req->amenity),
    ]);




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

    }


    public function deleteFile(Request $req){
        $filename = $req->filename;
        return response()->json( $filename);
    }


    public function payment_edit(Request $req,$id){
        $this->validate($req, [
            'advertisment_id' => 'integer',
        ]);

        payment::where('id', '=', $id)->update([
            'advertvertisment_id' => $req->advertisment_id,
        ]);

        return response()->json(['status'=>"success"]);
    }


    public function sendNotification($amount)
    {
        $user = auth()->user();

        $details = [
            'name' => 'HomeBound',
            'greeting' => 'Hey '.auth()->user()->first_name.' Your payment has been made',
            'body' => 'Thank you for your payment of $  '. $amount,
            'thanks' => 'Thank you for making it HomeBound.com!',
            'actionText' => 'View My Site',
            'actionURL' => url('/'),
        ];

        Notification::send($user, new InvoicePaid($details));


    }

    public function userReview(){
        $review = new Advertisment;
        $review->Review()->create($this->validateReview());
        return redirect()->back();
    }

    private function validateRequest(){
        return request()->validate([
            'full_name' => 'required|min:5',
            'card_number' => 'required',
            'ccv' =>'required',
            'amount' =>'required',
            'experation_date' =>'required',
            'user_id'=>'required',

        ]);
    }

    private function validateReview(){
        return request()->validate([
            'message' => 'required|min:5',
            'fullname' => 'required',
            'email' =>'required',
            'advertisment_id'=>'required',

        ]);
    }
}
