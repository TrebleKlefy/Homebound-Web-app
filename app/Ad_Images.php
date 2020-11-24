<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad_Images extends Model
{
    //
    protected $fillable = [
        'images', 'user_id','advert_id','advertisment_id','thumbnailimages',
    ];

    public function advertisment()
    {
        return $this->belongsTo(Advertisment::class);
    }

}
