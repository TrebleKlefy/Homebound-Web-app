<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\address;
use App\contacts;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    protected function register(Request $req)
    {
        $this->validate($req, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'trn' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'primary_number' => ['required', 'string', 'unique:contacts'],
            'secondary_number' => ['nullable', 'string', 'unique:contacts'],
          
            'streetline' => ['required', 'string'],
            'city' => ['required', 'string'],
            'country' => ['required', 'string'],
            'postOffice' => ['nullable', 'string'],
        ]);

        $user = new User;
        $user->first_name = $req->first_name;
        $user->last_name = $req->last_name;
        $user->gender = $req->gender;
        $user->trn = $req->trn;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->save();

        $user->contacts()->create(
            [
                'primary_number' => $req->primary_number,
                'secondary_number' => $req->secondary_number,
            
            ]
        );

        $user->address()->create(
            [
              
                'streetline' => $req->streetline,
                 'city' => $req->city, 
                 'country' => $req->country,
                 'postOffice' => $req->postOffice,
               
            ]
        );
        Auth::login($user);
        return redirect()->route('profile.show', ['user' => $user->id, 'message' => 'Registration success']);
      
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'first_name' => $data['first_name'],
    //         'last_name' => $data['last_name'],
    //         'trn' => $data['trn'],
    //         'email' => $data['email'],
    //         'gender' => $data['gender'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }
}
