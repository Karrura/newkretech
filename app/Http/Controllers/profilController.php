<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Session;

class profilController extends Controller
{
    public function index(){

        
    }

    public function show($username){
        // dd($username);
        return view('profil.profile');
    }

    public function edit(Request $req){
        $token = Session::get('token');
        $client = new Client();
        $apiUrl = "https://tugas-ppl-be-production.up.railway.app/api/user/".session()->get('dataId');
        
        $response = Http::withHeaders([
            'Authorization' => $token,
            'Content-Type' => 'application/json',
        ])->put($apiUrl, [
            'fullName' => $req->fullname,
            'username' => $req->username, 
            'password' => $req->password
        ]);
        $res = json_decode($response);
        if($res->success == 'true'){
            $req->session()->forget(['fullName', 'username', 'updatedAt', 'password']);
            // $req->session()->flush();
            Session::put('fullName', $res->data->fullName);
            Session::put('username', $res->data->username);
            Session::put('updatedAt', $res->data->updatedAt);
            Session::put('password', $req->password);

            return redirect('profile/'.session()->get('username'))->with('success', 'Your data now up to date!');
        }else{
            return redirect('profile/'.session()->get('username'))->with('error', 'Something went wrong while updateing your data!');
        }
        

        dd(json_decode($response));
    }
}
