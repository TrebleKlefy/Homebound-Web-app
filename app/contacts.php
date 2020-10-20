<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contacts extends Model
{
    protected $fillable = [
        'primary_number',
        'secondary_number',
       
    ];

    public function contactable(){
        return $this->morphTo();
    }
}
