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
        return view('pages.contactPerson', [
            'countries' => Country::all(),
            'centres' => Centre::all()
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
        $request->validate([
            'name' => 'string|required|min:2|max:255', 
            'number' => 'numeric', 
            'email' => 'email', 
        ]);

        $centre=Session::put('key', DB::table('centres')->where('name', $request->get('centre_name'))->get());

        $contact=DB::table('contact_people')->where('name', $request->input('name'))->get(); 

        if($contact->count() != 0){
            return view('pages.pdf');
        }else{
            $data = new ContactPerson;

            $data->name=$request->input('name');
            $data->telephonecode=$request->get('telephonecode');
            $data->number=$request->input('number');
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
