<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Door;
use App\Googl;

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
        return view('pages.doors', [
            'centres' => $centre
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
        //     'name' => 'required|string|min:2', 
        //     'exterior_length' => 'required|numeric', 
        //     'interior_length' => 'required|numeric', 
        //     'check' => 'nullable'
        // ]);

        $data = new Door; 

        $data->centre_name=$request->get('centre_name');

        $interior_photo=$request->file('interior_photo'); 
        
        $data->interior_photo=$interior_photo;

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



//         $curl = curl_init(); 

//         curl_setopt_arry($curl, array(

//         ));

//         curl -v "https://www.googleapis.com/upload/drive/v2/files/?uploadType=multipart" \
// 	    --header "Authorization: Bearer $TOKEN" \
// 	--header "Content-Type: multipart/related; boundary=\"$BOUNDARY\"" \
// 	--data-binary "@-"

//         curl -X POST 'https://www.googleapis.com/upload/drive/v3/files?uploadType=media' HTTP/1.1
// Content-Type: 'image/jpeg'
// Content-Length: 2000000
// --headerAuthorization: 'Bearer '.$token;

        $curl = curl_init();
            
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.googleapis.com/upload/drive/v3/files?uploadType=multipart",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => array('image' => $interior_photo),
            CURLOPT_HTTPHEADER => array(
            // "Authorization: Client-ID {{1cb45b7462006f}}",
            "Authorization: Bearer ".env('GOOGLE_DRIVE_ACCESS_TOKEN') //nuestro token para acceder a la api
            ),
        ));

        $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
              echo "cURL Error #:" . $err;
            } else {
              $json = dd(json_decode($response));
              $data->interior_photo = $json->data->link; //pilla link de la api
            }
        
            $data->save();

            dd('guardado');

            return view('pages.storeForm');

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
