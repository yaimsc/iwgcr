<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ContactPerson;
use App\Door; 

class Centre extends Model
{
    protected $primaryKey='number';
    
    public function contactPerson(){
        return $this->hasOne('App\ContactPerson'); 
    }

    public function door(){
        return $this->hasOne('App\Door');
    }
}
