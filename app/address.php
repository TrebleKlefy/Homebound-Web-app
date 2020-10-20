<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    //
    protected $fillable = [
        'streetline', 'city', 'parish','country','postOffice','primary_number','secondary_number',
    ];

    public function addressable(){
        return $this->morphTo();
    }

    //used to make one to one relation with database
    public  function  user(){
        return $this->belongsTo(User::class,'addressable');
    }
}
