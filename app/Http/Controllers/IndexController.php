<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function pdf(Request $request){
        return view('pages.pdf');
    }
}
