<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Session;
use Carbon;

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
            'height'  => $req->tinggi_badan,
            'weight'  => $req->berat_badan,
            'age'     => $req->umur,
            'insulin' => $req->insulin,
            'glucose' => $req->glukosa
        ]);

        $res = json_decode($response->getBody()->getContents());
        // dd($res);

        if ($res->sucess) {
            // return view('predict.predict', compact('res'));
            return redirect('predict')->with('res', $res);
        } else {
            return redirect('predict')->with('error', "Something went wrong doing prediction!");
        }
    } 

    public function report(Request $req){
        $token = Session::get('token');
        if($req->endstartdate || $req->enddate){
            $apiUrl = 'https://tugas-ppl-be-production.up.railway.app/api/history-test?dateFrom='.$req->startdate.'&dateTo='.$req->enddate;
        }else{
            $end = date('Y-m-d');
            $start = date('Y-m-d', strtotime($end. ' - 7 days'));
            $apiUrl = 'https://tugas-ppl-be-production.up.railway.app/api/history-test?dateFrom='.$start.'&dateTo='.$end;
        }
        // $apiUrl = "https://tugas-ppl-be-production.up.railway.app/api/history/";
        
        $response = Http::withHeaders([
            'Authorization' => $token,
            'Content-Type' => 'application/json',
        ])->get($apiUrl);

        $res = json_decode($response->getBody()->getContents());

        if($res->data){
            foreach ($res->data as $key => $value) {
                $score[$key] = (float)$value->predictionNumber;
                $periode[$key+1] = date("j-M-y", strtotime($value->createdAt));
            }
        }else{
            $score = null;
            $periode = null;
        }
        
        if ($res->success) {
            return view('predict.report', compact('res', 'score', 'periode'));
        } else {
            return redirect('predict')->with('error', "Something went wrong accessing report!");
        }
    }
}