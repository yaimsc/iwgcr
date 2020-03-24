<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Centre;

class Installer extends Model
{
    protected $table = 'installers';
    
    public function centre(){
        return $this->hasOne('App\Centre');
    }
}
