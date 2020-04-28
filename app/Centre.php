<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Country;
use App\ContactPerson;
use App\Door; 
use App\Installer;

class Centre extends Model
{
    protected $primaryKey='number';
    
    public function country(){
        return $this->hasOne('App\Country');
    }
    
    public function contactPerson(){
        return $this->hasOne('App\ContactPerson'); 
    }

    public function door(){
        return $this->hasOne('App\Door');
    }

    public function installer(){
        return $this->hasOne('App\Installer');
    }

    public function signDoor(){
        return $this->hasOne('App\SignDoor');
    }
}
