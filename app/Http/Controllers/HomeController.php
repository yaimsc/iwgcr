<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Centre;
use App\ContactPerson;
use App\Country;
use App\Door;
use App\Installer; 
use App\SignDoor;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role_id == 1){
           return redirect()->action('SuperadminController@index'); 
        }else{
            return view('pages.home.centre', [
                'centres' => Centre::all(), 
                'countries' => Country::all()
            ]);
        }
    }

    public function centres(){
        return view('pages.home.centre', [
            'centres' => Centre::all(), 
            'countries' => Country::all()
        ]);
    }

    public function centreData($name){
        return view('pages.home.centreData', [
            'centres' => DB::table('centres')->where('name', $name)->get(), 
            'contact_people' => DB::table('contact_people')->where('centre_name', $name)->get(), 
            'doors' => DB::table('doors')->where('centre_name', $name)->get(), 
            'installers' => DB::table('installers')->where('centre_name', $name)->get(), 
            'sign_doors' => DB::table('sign_doors')->where('centre_name', $name)->get()
        ]);
    }

    public function contactPeople(){
        return view('pages.home.contactPerson', [
            'contact_people' => ContactPerson::all(), 
            'countries' => Country::all()
        ]);
    }

    public function doors(){
        return view('pages.home.door', [
            'doors' => Door::all(), 
            'countries' => Country::all()
        ]);
    }
}
