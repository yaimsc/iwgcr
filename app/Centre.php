<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ContactPerson;

class Centre extends Model
{
    public function contactPerson(){
        return $this->hasOne('App\ContactPerson'); 
    }
}
