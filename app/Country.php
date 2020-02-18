<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Continent; 

class Country extends Model
{
    public function continent(){
        return $this->hasOne('App\Continent');
    }

    public function centre(){
        return $this->hasMany('App\Centre');
    }
}
