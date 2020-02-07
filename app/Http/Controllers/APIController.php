<?php

namespace App\Http\Controllers;

  

use Illuminate\Http\Request;

use App\Country;

use App\Continent;

  

class APIController extends Controller

{
    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function getContinents()

    {

        $data = Continent::get();

   

        return response()->json($data);

    }

   

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function getCountries(Request $request)

    {

        $data = Country::where('continent_id', $request->continent_id)->get();

   

        return response()->json($data);

    }

}