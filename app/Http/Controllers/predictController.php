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

    public function prosesPredict(Request $req){
        $token = Session::get('token');
        $apiUrl = "https://tugas-ppl-be-production.up.railway.app/api/prediction";
        
        $response = Http::withHeaders([
            'Authorization' => $token,
            'Content-Type' => 'application/json',
        ])->post($apiUrl, [
            'height'  => $req->tingg_badan,
            'weight'  => $req->berat_badan,
            'age'     => $req->umur,
            'insulin' => $req->insulin,
            'glucose' => $req->glukosa
        ]);

        $res = json_decode($response->getBody()->getContents());
        dd($res);
        if ($response->sucess()) {
            // Handle successful response
            dd($res);
        } else {
            // Handle error response
            return redirect('/')->with('error', "Something went wrong!");
        }
    } 
}