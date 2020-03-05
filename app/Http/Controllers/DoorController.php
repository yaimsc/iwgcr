<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Door;
use Config;

class DoorController extends Controller
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
        $centre=Session::get('centre_key');
        $country=Session::get('country_key');
        return view('pages.doors', [
            'centres' => $centre, 
            'countries' => $country
        ]);
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
            'front_photo' => 'required|max:10000',
            'exterior_photo' => 'required|max:10000', 
            'placement_photo' => 'required|max:10000', 
            'placement_photo_optional' => 'max:10000|nullable',
            'door_name' => 'required|min:2|max:255|string', 
            'exterior_length' => 'required|numeric', 
            'interior_length' => 'required|numeric'
        ]);

        $door=DB::table('doors')->where('centre_name', $request->input('centre_name'))->get(); 
        if($door->count() != 0){
            return view('pages.storeForm');
        }else{
            $data = new Door; 

        $data->centre_name=$request->get('centre_name');
        $data->country=$request->get('country'); 

        //INTERIOR_PHOTO
        $interior_photo=$request->file('interior_photo'); //get file from form
        $interior_image64 = base64_encode(file_get_contents($interior_photo)); //put the photo into base64
        $data->interior_photo = $this->uploadPhotos($interior_image64)->data->link; //get the link in whit it is stored the photo and put it in the form table from db

        //FRONT_PHOTO

        $front_photo=$request->file('front_photo');
        $front_image64 = base64_encode(file_get_contents($front_photo));
        $data->front_photo = $this->uploadPhotos($front_image64)->data->link;

        //EXTERIOR PHOTO

        $exterior_photo=$request->file('exterior_photo'); 
        $exterior_image64=base64_encode(file_get_contents($exterior_photo));
        $data->exterior_photo = $this->uploadPhotos($exterior_image64)->data->link;

        //IQ PLACEMENT PHOTO

        $placememt_photo=$request->file('placement_photo');
        $placement_image64=base64_encode(file_get_contents($placememt_photo));
        $data->placement_photo=$this->uploadPhotos($placement_image64)->data->link;

        //IQ PLACEMENT PHOTO OPTIONAL

        $placement_photo_optional=$request->file('placement_photo_optional'); 
        if(empty($placement_photo_optional)){
            $data->placement_photo_optional=null;
        }else{
            $placement_optional_image64=base64_encode(file_get_contents($placement_photo_optional)); 
            $data->placement_photo_optional=$this->uploadPhotos($placement_optional_image64)->data->link;
        }
        

        // $fileMetadata = new Google_Service_Drive_DriveFile(array(
        //     'name' => $interior_photo));
        // $content = file_get_contents($interior_photo);
        // $file = $driveService->files->create($fileMetadata, array(
        //     'data' => $content,
        //     'mimeType' => 'image/jpeg',
        //     'uploadType' => 'multipart',
        //     'fields' => 'id'));
        // printf("File ID: %s\n", $file->id);
        //     dd($file);


        $data->door_name=$request->input('door_name'); 
        $data->exterior_length=$request->input('exterior_length');
        $data->interior_length=$request->input('interior_length');
        $data->type_length=$request->input('type_length');
        $data->distance_knobs_frame_ok=$request->has('distance_knobs_frame_ok'); //boolean
        
        $data->save();

        return view('pages.storeForm');
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
