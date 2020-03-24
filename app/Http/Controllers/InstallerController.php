<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Country;
use App\Installer;


class InstallerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'centre_number' => 'required'
        ]);

        $centre_number=$request->get('number');

        $centres = Session::put('centre_number_key', DB::table('centres')->where('number', $centre_number)->get());

        // Session::put('centre_country_key', DB::table('centres')->where('number', $centre_number))->value('country');
        
        return view('pages.sign-off.installer', [
            'countries' => Country::all(), 
            'centres' => $centres
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'installer_name' => 'required', 
        //     'installer_email' => 'email|required',
        //     'installer_telephonecode' => 'required', 
        //     'installer_telephone' => 'required'
        // ]); 

        $installer= DB::table('installers')->where('email', $request->input('email'))->get();
        $centres=Session::get('centre_number_key'); //sesion con el centro del number selected
        $data = new Installer; 

        $data->name=$request->input('installer_name'); 
        $data->email=$request->input('installer_email'); 
        $data->telephonecode=$request->get('installer_telephonecode');
        $data->telephone=$request->input('installer_telephone');
        foreach($centres as $centre){
            $data->centre_name=$centre->name;
        }
        
        $data->save();

        return redirect()->route('sig-off.create', [
            'centres' => $centres
        ]);

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
