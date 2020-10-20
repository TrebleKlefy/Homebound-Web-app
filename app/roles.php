<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    //
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
