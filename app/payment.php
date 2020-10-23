<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    //
    protected $fillable = [
        'full_name', 'card_number', 'ccv','experation_date','amount','user_id','advertvertisment_id',
    ];

    public function user()
    {        
        return $this->belongsTo(User::class);
    }
}
