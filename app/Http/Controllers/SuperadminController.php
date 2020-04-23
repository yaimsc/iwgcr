<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Country; 
use App\Centre;
use App\ContactPerson;
use App\User;
use App\Door; 

class SuperadminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.superadmin.centre', [
            'countries' => Country::all(),
            'centres' => Centre::all()
        ]);
    }

    public function centres(){
        return view('pages.superadmin.centre', [
            'centres' => Centre::all(), 
            'countries' => Country::all()
        ]);
    }

    public function centreData($number){
        return view('pages.superadmin.centreData', [
            'centres' => DB::table('centres')->where('number', $number)->get(), 
            'contact_people' => DB::table('contact_people')->where('centre_number', $number)->get(), 
            'doors' => DB::table('doors')->where('centre_number', $number)->get(),
            'installers' => DB::table('installers')->where('centre_number', $number)->get(), 
            'sign_doors' => DB::table('sign_doors')->where('centre_number', $number)->get()
        ]);
    }

    public function contactPeople(){
        return view('pages.superadmin.contactPerson', [
            'contact_people' => ContactPerson::all(), 
            'countries' => Country::all()
        ]);
    }

    public function doors(){
        return view('pages.superadmin.door', [
            'doors' => Door::all(), 
            'countries' => Country::all()
        ]);
    }

    public function users(){
        return view ('pages.superadmin.user', [
            'users' => User::all(), 
            'countries' => Country::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $name)
    {
        $centre=Centre::where('id', $id)->first();
        $contact_person=ContactPerson::where('centre_name', $name)->first();
        $door=Door::where('centre_name',$name)->first();

        if(!$centre){
            return redirect()->route('superadmin.centreData');
        }else{
            if(Auth::user()->role_id !== 1){
                return redirect()->route('superadmin.centreData');
            }else{
                return view('superadmin.editCentreData', [
                    'centres' => $centre, 
                    'contact_people' => $contact_person, 
                    'doors' => $door
                    ]);
            }

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
