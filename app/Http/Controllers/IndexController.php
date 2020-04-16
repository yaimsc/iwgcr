<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Continent;
use App\Country; 
use App\Centre;

class IndexController extends Controller
{
    public function index(){
        return view('pages.index', [
            'continents' => Continent::all(),
            'countries' => Country::all(), 
            'centres' => Centre::all()
        ]);
    }

    public function ajax($name){
        $centres = DB::table('centres')->where('country', $name)->get();
        return json_encode($centres);
    }

    public function pdf(Request $request){
        return view('pages.pdf');
    }

    public function showPDF(){
        $path ="/download/IWG_Communication_Rooms_Project_Survey.pdf";
        return response()->file($path);
    }

    public function storeForm(){
        return view('pages.sign-off.storeForm');
    }

    public function privacy(){
        return view('pages.privacy');
    }
}
