<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Session;

class reglogController extends Controller
{
    public function login(){

        return view('reglog.login');
    }

    public function proreg(Request $req){
        // dd($req);
        $client = new Client();
        $apiUrl = "https://tugas-ppl-be-production.up.railway.app/api/register";
        $response = Http::post($apiUrl, [
            'username'  => $req->username,
            'fullName'  => $req->nama_lengkap,
            'password'  => $req->password
        ]);
        $res = json_decode($response);
        if($res->success == 'true'){
            return redirect('/')->with('success', "Account created successfully, you now can Login!");
        }else{
            return redirect('/')->with('error', "Something went wrong!");
        }  
    }

    public function prolog(Request $req){
        $client = new Client();
        $apiUrl = "https://tugas-ppl-be-production.up.railway.app/api/login";
        $response = Http::post($apiUrl, [
            'username'  => $req->username,
            'password'  => $req->password
        ]);
        
        if($response->getStatusCode() == '200'){
            $res = json_decode($response->getBody()->getContents());
            Session::put('dataId', $res->user->_id);
            Session::put('fullName', $res->user->fullName);
            Session::put('username', $res->user->username);
            Session::put('createdAt', $res->user->createdAt);
            Session::put('updatedAt', $res->user->updatedAt);
            Session::put('deleted', $res->user->deleted);
            Session::put('password', $req->password);
            Session::put('login', 'true');
            Session::put('token', $res->token);
            return redirect('predict');
        }else{
            return redirect('/')->with('error', "Username or Password aren't in our list!");
        }
        dd($response->getBody()->getContents());
    }

    public function epilog(Request $request){
        $request->session()->forget(['userId', 'fullName', 'username', 'createdAt', 'updatedAt', 'deleted', 'password', 'login']);
        $request->session()->flush();
        return redirect('/')->with("success","Sucessfully Logout!");
    }

}
