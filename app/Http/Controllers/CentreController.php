<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use Session;
use App\Country; 
use App\Centre; 


class CentreController extends Controller
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
        $validatedData = Validator::make($request->all(),[
            'centre_number' => 'digits:4|required|'
        ]); 

        if($validatedData->fails()){
            Session::flash('error', 'This input requires 4 digits');
            return redirect()->back();
        }

        $centre=DB::table('centres')->where('number', $request->input('centre_number'))->get(); 
        if($centre->count() !== 0){
            Session::flash('msg-pre', 'This centre exists already. If you continue the information is going to be override.');  
        }
        Session::put('number_key', $request->input('centre_number'));
        return view('pages.centre', [
            'countries' => Country::all(), 
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
        $this->validate($request, [
            'centre_name' => 'required|string|min:2|max:255', 
            'centre_number' => 'digits:4|required', 
            'country' => 'required', 
            'city' => 'required|min:2|max:255|string',
            'postal_code' => 'min:2|max:10',
            'address' => 'required|min:2|max:255|string', 
            'province' => 'required|min:2|max:25|string'
        ]);

            // $country=DB::table('centres')->where('country', $request->get('country'))->get(); 
            Session::put('country_key', DB::table('countries')->where('name', $request->get('country'))->get());

            $centre= DB::table('centres')->where('number', Session::get('number_key'))->get();

            if($centre->count() !== 0){
            DB::table('centres')->where('number', Session::get('number_key'))->delete(); //vaciar 
            }
            $data = new Centre; 
            
            $data->name=$request->input('centre_name'); 
            $data->number=Session::get('number_key'); //num de sesión guardado en create()
            $data->address=$request->input('address');
            $data->city=$request->input('city'); 
            $data->postal_code=$request->input('postal_code'); 
            $data->province=$request->input('province');
            $data->country=$request->get('country'); 

            $data->save(); 

            return view('pages.contactPerson', [
                // 'countries' =>  DB::table('countries')->where('name', $request->get('country'))->get(),
                'countries' => Country::all(),
                'centres' => DB::table('centres')->where('number', Session::get('number_key'))->get(), 
                // 'messages' => $validator->messages()
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
