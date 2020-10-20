<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Http\Request;
// namespace App\Policies;
use App\address;
use App\contacts;
use App\advertisment;
use App\Profile;
use App\Ad_Images;
use Auth;

class ProfileController extends Controller
{
    public function index(User $user)
    {//to get the user name display on the page
        // $advertisments = Advertisment::All();
        // $image = Ad_Images::All();
       $adds = DB::table('users')
       ->join('advertisments', 'users.id','=','advertisments.user_id')->get();
       return view('profiles.index' ,compact('user','adds'));
    }

    // //returning the user to the function allowing laravel to do it in a compact way
    public function edit(User $user)
    {
        //needed along with the function from polices to  view the button
        // $this->authorize('update',$user->profile);


        return view('profiles.edit' ,compact('user'));
    }



 //update the files
 public function update(User $user)
 {
     $user->update($this->validateRequest());
    //  $user->contacts()->update($this->validateRequesttwo());
     $user->address()->update($this->validateRequestthree());
    //  $this->storeimage($user);
    
    return redirect()->back()->with('message', 'Successfull update!');
    // return "it works";
 }

//  //this simply deletes all the items
//  public function destroy(testimonials $user)
//  {
//      $userprofile->delete();
//      return back();
//  }

// public function storeimage(User $user){
//     $this->storeimage($user);
// }


 //validate fields
 private function validateRequest(){
//using the function name tap to store all the data is cool
     return request()->validate([
        'first_name' => ['required', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'],
        'trn' => ['required', 'string', 'max:255'],
        'gender' => ['required', 'string', 'max:255'],
        // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        'images' => 'sometimes|file|image|max:5000',

     ]);
 }

//  private function validateRequesttwo(){
//     return request()->validate([
//         'primary_number' => ['required', 'string', 'unique:contacts'],
//         'secondary_number' => ['nullable', 'string', 'unique:contacts'],
//     ]);
//  }
 private function validateRequestthree(){
    return request()->validate([
        'streetline' => ['required', 'string'],
        'city' => ['required', 'string'],
        'country' => ['required', 'string'],
        'postOffice' => ['nullable', 'string'],
    ]);
 }

 public function storeImages(Request $request)
 {
    $image = $request->image;

        list($type, $image) = explode(';', $image);
        list(, $image)      = explode(',', $image);
        $image = base64_decode($image);
        $image_name= time().'.jpeg';
        $path = public_path('/uploads/images/'.$image_name);

        file_put_contents($path, $image);
    $user = Auth::user();
    // $user->update()
    $imageupload = User::findOrFail($user->id);
    // $flight = App\Flight::find(1);
    $imageupload->profile_photo = $image_name;
    $imageupload->save();
    // $imageupload = User::where('profile_photo', '=',$user->id )->update($image_name);

    return response()->json(['status'=>"success"]);

 }


 public function adverts($id){
    // $advertisments =DB::table('users')
    // ->join('advertisments', function ($join) {
    //     $join->on('users.id', '=', 'advertisments.user_id')
    //          ->where('advertisments.user_id', '=', $id);
    // })
    // ->get();
    $advertisments = Advertisment::where('user_id',$id)->get();
    
  return 
 view('listing.userview_listing', compact('advertisments')); 
}


}
