<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    //

    protected $fillable = [
        'message','stars','email', 'fullname','advertisment_id',
    ];

    public function advertisment()
    {
        return $this->belongsTo(Advertisment::class);
    }
}
