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
        $this->validate($request, [
            'centre_name' => 'required'
        ]);

        $country=$request->get('country');
        $centre_name=$request->get('centre_name');

        $centres = DB::table('centres')->where('name', $centre_name)->get();

        // $installer = DB::table('installers')->where('centre_name', $centre_name)->get();
 
            // if($installer->count() !== 0){
            //     Session::flash('msg-post', 'This centre has the post-installation form completed. If you continue the information is going to be override.');
            // }

            return view('pages.sign-off.installer', [
                'countries' => Country::all(), 
                'centres' => $centres
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'centre_name' => 'required'
        ]);

        $country=$request->get('country');
        $centre_name=$request->get('centre_name');

        $centres = DB::table('centres')->where('name', $centre_name)->get();

        $installer = DB::table('installers')->where('centre_name', $centre_name)->get();
 
            if($installer->count() !== 0){
                Session::flash('msg-post', 'This centre has the post-installation form completed. If you continue the information is going to be override.');
            }

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

        $installer= DB::table('installers')->where('centre_name', $request->get('centre_name'))->get();

        if($installer->count() !== 0){
            DB::table('installers')->where('centre_name', $request->get('centre_name'))->delete(); //vaciar 
        }

        $data = new Installer; 

        $data->name=$request->input('installer_name'); 
        $data->email=$request->input('installer_email'); 
        $data->telephonecode=$request->get('installer_telephonecode');
        $data->telephone=$request->input('installer_telephone');
        $data->centre_name=$request->get('centre_name');
        
        $data->save();

        return view('pages.sign-off.doors', [
            'centres' => DB::table('centres')->where('name', $request->get('centre_name'))->get()
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
