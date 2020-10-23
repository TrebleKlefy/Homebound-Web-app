<?php

namespace App;
use App\advertisment;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','profile_photo','gender','usertype','trn',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function contacts()
    {
        return $this->morphone(Contacts::class, 'contactable');
    }
    
    public function role()
    {
        return $this->belongsToMany(Roles::class);
    }

    //address
    public function address()
    {
        return $this->morphone(Address::class, 'addressable');
    }

    // public function advertisments()
    // {
    //     return $this->hasMany(Advertisment::class)->orderByDesc('created_at');
    // }


    public function advertisments()
    {
        return $this->hasmany(Advertisment::class,'user_id','id');
    }


    public function payments(){
        return $this->hasmany(Payment::class,'user_id','id');
    }
    
    // public function getImage($path)
    // {
    //     $avatar = asset('avatars/' . $path . '/default-user.jpg');
    //     if (!is_null($this->profile_photo)) {
    //         $avatar = asset('avatars/' . $path . '/' . $this->profile_photo);
    //     }
    //     return $avatar;
    // }


    public function fullname()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function addressDetails(){
        return $this->address->streetline . ', ' . $this->address->postOffice.','.$this->address->city . ', ' . $this->address->country;
        
    } 

    public function contactdestails(){
        return $this->contacts->primary_number . ',' . $this->contacts->secondary_number;
        
    }
}
