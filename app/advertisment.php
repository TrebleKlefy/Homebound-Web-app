<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class advertisment extends Model
{
      protected $fillable = [
        'rooms', 'bath_rooms', 'kitchen_rooms','parish','apartment_number','street','images','description',
        'email','photo_name' , 'photo_description', 'price', 'buildingtype','contract', 'phone_number',  'amenity', 'images','name','street2','feature',
    ];



  //used to make one to one relation with database
  public function user()
  {
      return $this->belongsTo(User::class);
  }



  public function Ad_Images()
  {
      return $this->hasMany(Ad_Images::class,'id');
  }


}
