<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country; 
Use App\Centre; 

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
    public function create()
    {
        return view('pages.centre', [
            'countries' => Country::all()
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
            'name' => 'string|required|min:2|max:255', 
            'number' => 'numeric|required', 
            'country' => 'string|required', 
            'city' => 'string|required|min:2'
        ]);

        $data = new Centre; 

        $data->name=htmlentities($request->input('name')); 
        $data->number=htmlentities($request->input('number'));
        $data->country=$request->get('country'); 
        $data->city=htmlentities($request->input('city')); 

        $data->save(); 

        return view('pages.contactPerson', [
            'countries' => Country::all(),
            'centres' => Centre::all()
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
