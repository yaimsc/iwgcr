<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\SignDoor; 

class SignOffController extends Controller
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
       //
    }

    /* Sube la photo a la API y nos devuelve un JSON */

    public function uploadPhotos($image64){

        $curl = curl_init();

        // $client_id = "4b2f0cce3b2522f";
        $client_id = config('services.imgur.client_id');
            
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.imgur.com/3/image",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => array('image' => $image64),
            CURLOPT_HTTPHEADER => array(
                "Authorization: Client-ID " .$client_id,
            //"Authorization: Bearer ".env('IMGUR_ACCESS_TOKEN') //nuestro token para acceder a la api
            ),
        ));

        $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
              echo "cURL Error #:" . $err;
            } else {
              return $json = json_decode($response);
            //   $data->$dbName = $json->data->link; //pilla link de la api
            } 
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
            'interior_photo' => 'required|max:10000', 
            'exterior_photo' => 'required|max:10000', 
            'installation_photo' => 'required|max:10000', 
            'iq_cylinder_photo' => 'required|max:10000',
            'purple_light' => 'required', 
            'mac_whitelisted' => 'required', 
            'centre_activated_titan' => 'required',
            'maintenance_tags_given_centre' => 'required',
        ]);

        $signOff=DB::table('sign_doors')->where('centre_name', $request->get('centre_name'))->get();
        if($signOff->count() !== 0){
            DB::table('sign_doors')->where('centre_name', $request->get('centre_name'))->delete();
        }
        $data = new SignDoor; 

        $data->centre_name=Session::get('name_key');
        $data->centre_number=$request->get('centre_number');

        //INTERIOR_PHOTO
        $interior_photo=$request->file('interior_photo'); //get file from form
        $interior_image64 = base64_encode(file_get_contents($interior_photo)); //put the photo into base64
        $data->interior_photo = $this->uploadPhotos($interior_image64)->data->link; //get the link in whit it is stored the photo and put it in the form table from db

        //EXTERIOR PHOTO

        $exterior_photo=$request->file('exterior_photo'); 
        $exterior_image64=base64_encode(file_get_contents($exterior_photo));
        $data->exterior_photo = $this->uploadPhotos($exterior_image64)->data->link;

        //IQ INSTALLATION PHOTO

        $installation_photo=$request->file('installation_photo');
        $placement_image64=base64_encode(file_get_contents($installation_photo));
        $data->installation_photo=$this->uploadPhotos($placement_image64)->data->link;

        //IQ CYLINDER PHOTO 

        $iq_cylinder_photo=$request->file('iq_cylinder_photo'); 
        $iq_cylinder_photo_image64=base64_encode(file_get_contents($iq_cylinder_photo)); 
        $data->iq_cylinder_photo=$this->uploadPhotos($iq_cylinder_photo_image64)->data->link;

        //CHECKBOX
        
        $data->purple_light=$request->has('purple_light'); //boolean
        $data->mac_whitelisted=$request->has('mac_whitelisted'); //boolean
        $data->centre_activated_titan=$request->has('centre_activated_titan'); //boolean
        $data->maintenance_tags_given_centre=$request->has('maintenance_tags_given_centre'); //boolean
        
        $data->save();

        return view('pages.sign-off.storeForm');
        // }
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
