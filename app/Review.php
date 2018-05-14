<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function author(){
        return $this->belongsTo(User::class, 'author_id');
    }

    public function businessPage(){
        return $this->belongsTo(BusinessPage::class);
    }
}
