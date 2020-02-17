<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Centre;
use App\ContactPerson;

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
        return view('pages.home.homeCentre', [
            'centres' => Centre::all()
        ]);
    }

    public function centre(){
        return view('pages.home.homeCentre', [
            'centres' => Centre::all()
        ]);
    }

    public function contactPerson(){
        return view('pages.home.homeContactPerson', [
            'contact_people' => ContactPerson::all()
        ]);
    }
}
