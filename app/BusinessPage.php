<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessPage extends Model
{

    public function owner(){
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
