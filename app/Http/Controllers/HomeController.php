<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Centre;
use App\ContactPerson;
use App\Country;
use App\Door;
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
        $this->middleware('auth');
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
