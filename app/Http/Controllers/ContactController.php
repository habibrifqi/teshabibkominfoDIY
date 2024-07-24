<?php

namespace App\Http\Controllers;

use App\Models\Api;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    
    public function index()
    {
        dd(Contact::get());
        return 'asdas';
    }

    public function api($nomor)
    {
       
        if ($nomor == '5') {
            $data = Api::plima();
            $response = [
                'status' => 'success', 
                'data'  => $data           
            ];
            return response()->json($response, 200);
        }elseif($nomor == '6'){
            $data = Api::penam();

            $response = [
                 'status' => 'success', 
                 'data'  => $data,         
            ];
            return response()->json($response, 200);
        }else{

            $response = [
                'status' => 'failed', 
                'data'  => 'nomor tidak ada'          
            ];
            return response()->json($response, 200);
        }
    }
}
