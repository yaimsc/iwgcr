<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth; 
use App\Centre; 
Use App\ContactPerson;
use App\Country;



class SearchController extends Controller
{
    public function centres(Request $request){
        $filter=$request->get('country');
        if($filter == ""){
            if(Auth::user()->role_id == 1){
                return view('pages.superadmin.centre', [
                    'centres' => Centre::all(), 
                    'countries' => Country::all()
                ]);
            }else{
                return view('pages.home.centre', [
                    'centres' => Centre::all(), 
                    'countries' => Country::all()
                ]);
            }
        }else{
            $centres = DB::table('centres')->where('country', $filter)->get();
            if(Auth::user()->role_id == 1){
                return view('pages.superadmin.centre', [
                    'centres' => $centres, 
                    'countries' => Country::all()
                ]);
            }else{
                return view('pages.home.centre', [
                    'centres' => $centres, 
                    'countries' => Country::all()
                ]);
            }
        }
    }

    public function contactPeople(Request $request){
        $filter=$request->get('country');
        if($filter == ""){
            if(Auth::user()->role_id == 1){
                return view('pages.superadmin.contactPerson', [
                    'contact_people' => ContactPerson::all(), 
                    'countries' => Country::all()
                ]);  
            }else{
                return view('pages.home.contactPerson', [
                    'contact_people' => ContactPerson::all(), 
                    'countries' => Country::all()
                ]);
            }
        }else{
            $contact_people = DB::table('contact_people')->where('country', $filter)->get();
            if(Auth::user()->role_id == 1){
                return view('pages.superadmin.contactPerson', [
                    'contact_people' => $contact_people, 
                    'countries' => Country::all()
                ]);
            }else{
                return view('pages.home.contactPerson', [
                    'contact_people' => $contact_people, 
                    'countries' => Country::all()
                ]);
            }
        }
    }

}
