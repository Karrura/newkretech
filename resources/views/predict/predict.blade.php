@extends('template.nav')
@section('title', 'Kretech - Predict')
@section('isi')
<div class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6" style="margin-top: 200px; padding-left: 100px">
                <h1 style="font-family: Quicksand; color: rgba(32, 151, 145, 1);"><strong>Welcome KRETECHIAN! Do you want to do diabetes predict now, {{session('username')}}?</strong></h1>
            </div>
            <div class="col-6" style="padding-right: 80px">
                <div class="border border-1 rounded-5 border-success-subtle p-3" style="margin-top: 100px;">
                    <h1 style="font-family: Quicksand; color: rgba(32, 151, 145, 1); margin-top: -10%; margin-left: 30px; text-shadow: 2px 3px rgba(32, 151, 145, 0.486);"><strong>Prediksi Diabetes</strong></h1>
                    @php
                        if(Session::get('res')){
                            $res = Session::get('res');
                            if($res->sucess == 'true'){
                    @endphp
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                <div class="row">
                                    <span><strong>Data</strong></span>
                                </div>
                                <div class="row">
                                    <div class="col-2"><label class="text-dark">Age</label></div>
                                    <div class="col-2">{{$res->data->dataPrediksi->age}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-2"><label class="text-dark">Weigth</label></div>
                                    <div class="col-2">{{$res->data->dataPrediksi->weight}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-2"><label class="text-dark">Height</label></div>
                                    <div class="col-2">{{$res->data->dataPrediksi->height}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-2"><label class="text-dark">Insulin</label></div>
                                    <div class="col-2">{{$res->data->dataPrediksi->insulin}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-2"><label class="text-dark">Glucose</label></div>
                                    <div class="col-2">{{$res->data->dataPrediksi->glucose}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-2"><label class="text-dark">BMI</label></div>
                                    <div class="col-2">{{$res->data->dataPrediksi->bmi}}</div>
                                </div>
                                <div class="row">
                                    <strong>Prediction Score: {{$res->data->hasilPrediksi->score}}</strong>
                                </div>
                                <div class="row">
                                    <strong>Result: {{$res->data->hasilPrediksi->prediction}}</strong>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                    @php
                            }
                        }else if(Session::get('error')){
                    @endphp
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <div class="row">
                                    <span><strong>{{Session::get('error')}}</strong></span>
                                </div>
                            </div>
                    @php
                        }
                    @endphp
                    <form action="{{url('proses-predict')}}" method="post" enctype="multipart/form-data" class="pt-3" style="font-family: Quicksand; margin: 20px;">
                        @csrf
                        @method('POST')   
                        <span class="text-danger" style="font-size: 10px"><strong>*Hanya angka, tanpa satuan.</strong></span>                     
                        <div class="mb-3">
                            <input type="text" class="form-control form-control-lg" name="glukosa" placeholder="Level Glukosa*" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control form-control-lg" name="insulin" placeholder="Insulin*" required>
                        </div><div class="mb-3">
                            <input type="text" class="form-control form-control-lg" name="tinggi_badan" placeholder="Tinggi Badan*" required>
                        </div><div class="mb-3">
                            <input type="text" class="form-control form-control-lg" name="berat_badan" placeholder="Berat Badan*" required>
                        </div><div class="mb-3">
                            <input type="text" class="form-control form-control-lg" name="umur" placeholder="Umur*" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-lg" style="background-color: rgba(32, 151, 145, 1); color: white; font-family: Quicksand; width: 50%"><strong>Submit</strong></button>
                        </div>
                    </form>
                    <div class="card-body pt-2 pb-2 text-center">
                        <h5><a href="{{url('report')}}/" style="color: rgba(32, 151, 145, 1); font-family: Quicksand;"><strong>Lihat riwayat prediksi</strong></a></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection