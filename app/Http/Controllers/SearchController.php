<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Centre; 
Use App\ContactPerson;
use App\Country;


class SearchController extends Controller
{
    public function centres(Request $request){
        $filter=$request->get('country');
        if($filter == ""){
            return view('pages.home.homeCentre', [
                'centres' => Centre::all(), 
                'countries' => Country::all()
            ]);
        }else{
            $centres = DB::table('centres')->where('country', $filter)->get();

            return view('pages.home.homeCentre', [
                'centres' => $centres, 
                'countries' => Country::all()
            ]);

        }
    }

    public function contactPeople(Request $request){
        $filter=$request->get('country');
        if($filter == ""){
            return view('pages.home.homeContactPerson', [
                'contact_people' => ContactPerson::all(), 
                'countries' => Country::all()
            ]);
        }else{
            $contact_people = DB::table('contact_people')->where('country', $filter)->get();

            return view('pages.home.homeContactPerson', [
                'contact_people' => $contact_people, 
                'countries' => Country::all()
            ]);

        }
    }
}
