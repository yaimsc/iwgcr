<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Centre;

class ContactPerson extends Model
{
    public function centre(){
        return $this->hasOne('App\Centre'); 
    }

}
