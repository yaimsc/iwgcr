<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Continent;
use App\Country; 

class IndexController extends Controller
{
    public function index(){
        return view('pages.index', [
            'continents' => Continent::all(),
            'countries' => Country::all()
        ]);
    }

    public function pdf(){
        return view('pages.pdf');
    }

    public function photos(){
        return view('pages.photos'); 
    }
}
