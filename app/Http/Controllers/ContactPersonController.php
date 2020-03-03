<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\ContactPerson;
use App\Country;
use App\Centre;


class ContactPersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $country=Session::get('country_key');
        return view('pages.contactPerson', [
            'countries' => $country,
            'centres' => Centre::where('country', $country)
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
        $this->validate($request, [
            'name' => 'required|string|min:2|max:255',
            'centre_phone' => 'nullable',
            'mobile_phone' => 'nullable', 
            'email' => 'email', 
        ]);

        Session::put('centre_key', DB::table('centres')->where('name', $request->get('centre_name'))->get());
        
        $contact=DB::table('contact_people')->where('name', $request->input('name'))->get(); 

        if($contact->count() !== 0){
            return  redirect()->action('IndexController@pdf');
        }else{
            $data = new ContactPerson;

            $data->name=$request->input('name');
            $data->centre_telephonecode=$request->get('centre_telephonecode');
            $fijo=$request->input('centre_phone'); 
            $data->centre_phone= empty($fijo) ? null : $fijo; 
            $data->mobile_telephonecode=$request->get('mobile_telephonecode');
            $movil=$request->input('mobile_phone');
            $data->mobile_phone= empty($movil) ? null : $movil; 
            $data->email=$request->input('email');
            $data->centre_name=$request->get('centre_name');

            $data->save(); 

            return view('pages.pdf');
        }

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
    public function edit($id)
    {
        //
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
