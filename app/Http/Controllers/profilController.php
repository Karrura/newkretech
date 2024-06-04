<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class profilController extends Controller
{
    public function index(){

        
    }

    public function show($username){
        // dd($username);
        return view('profil.profile');
    }

    public function edit(Request $req){
        dd($req);
    }
}
