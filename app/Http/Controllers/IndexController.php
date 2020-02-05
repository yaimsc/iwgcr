<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country; 

class IndexController extends Controller
{
    public function index(){
        return view('/', [
            'countries' => Country::all()
        ]);
    }
}
