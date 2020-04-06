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
    public function index(Request $request)
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

        $country=$request->get('country');
        $centre_number=$request->get('centre_number');

        $centres = DB::table('centres')->where('number', $centre_number)->get();

        $installer = DB::table('installers')->where('centre_number', $centre_number)->get();
 
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
        $request->validate([
            'installer_name' => 'required', 
            'installer_email' => 'email|required',
            'installer_telephonecode' => 'required', 
            'installer_telephone' => 'required'
        ]); 

        $installer= DB::table('installers')->where('centre_number', $request->get('centre_number'))->get();

        Session::put('name_key', DB::table('centres')->where('number', $request->get('centre_number'))->value('name')); //guardar solo nombre seleccionado
        Session::put('number_key', $request->get('centre_number'));

        if($installer->count() !== 0){
            DB::table('installers')->where('centre_number', $request->get('centre_number'))->delete(); //vaciar 
        }

        $data = new Installer; 

        $data->name=$request->input('installer_name'); 
        $data->email=$request->input('installer_email'); 
        $data->telephonecode=$request->get('installer_telephonecode');
        $data->telephone=$request->input('installer_telephone');
        $data->centre_name=Session::get('name_key');
        $data->centre_number=$request->get('centre_number');
        
        $data->save();

        return redirect()->route('sign-off.create');

        // return view('pages.sign-off.doors', [
        //     'centres' => DB::table('centres')->where('number', $request->get('centre_number'))->get()
        // ]);

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
