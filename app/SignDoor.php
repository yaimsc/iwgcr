<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Centre;

class SignDoor extends Model
{
    protected $table = 'sign_doors';
    
    public function centre(){
        return $this->hasOne('App\Centre');
    }
}
