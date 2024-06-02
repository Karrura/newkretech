<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Session;

class predictController extends Controller
{
    public function index(){
        
        return view('predict.predict');
    }

    // public static function getHttpHeaders(){

    //     $bearerToken = session('token');
    //     $headers    =   [
    //          'headers' => [
    //          'Content-Type' => 'application/json',
    //            'Authorization' => 'Bearer ' .$bearerToken,
    //          ],
    //          'http_errors' => false,
    //      ];
    //      return $headers;
    // }

    public  function prosesPredict(Request $req){
        $client = new Client();
        // dd($client);
        $apiUrl = "https://tugas-ppl-be-production.up.railway.app/api/prediction";
        $response = Http::post($apiUrl, [
            'height'  => $req->tingg_badan,
            'weight'  => $req->berat_badan,
            'age'  => $req->umur,
            'insulin'  => $req->insulin,
            'glucose'  => $req->glukosa
        ]);
        dd(json_decode($response));
        $res = json_decode($response);
        if($res->success == 'true'){
            
        }else{
            
        }
    } 
}
