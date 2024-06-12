@extends('template.nav')
@section('title', 'Kretech - About Us')
@section('isi')
<div class="container">
    <div class="container-fluid">
        <div class="row p-2">
            <div class="col-12 mt-3">
                <a href="{{url('predict')}}">
                    <ion-icon name="arrow-back-outline" style="color: rgba(32, 151, 145, 1); font-size: 35px"></ion-icon>
                </a>
            </div>
            <div class="col text-center">
                <h2 style="font-family: Quicksand; color: rgba(32, 151, 145, 1); margin-top: -2%"><strong>Tentang Kami</strong></h2>
            </div>
        </div>
        <div class="d-flex justify-content-center pt-3" style="font-family: Quicksand">
            <div class="card text-center w-50 rounded-4" style="background-color: #a2e7e3">
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <img src="{{asset('old')}}/assets/Group6.svg" alt="Kretech" style="height: 80px; width: auto; display: flex; align-items: center">
                        <div class="card-text ps-3 align-self-center" style="text-align: left;">
                            <span class="card-title h5"><strong>Kretech Ltd.</strong></span>
                            <br>
                            <span class="card-subtitle h6 mb-2">Technology For All</span>
                        </div>
                    </div>
                    <br>
                    <br>
                    <p class="card-text" style="font-family: Quicksand"><strong>Our Nutrisionist</strong></p>
                    <div class="text-left">
                        <span style="font-family: Quicksand; margin-top: 0; margin-botton: 0;">
                            <strong>
                                Bella Apriyani, S.Gz<br>
                            </strong>
                        </span>
                    </div>
                    <br>
                    <p class="card-text" style="font-family: Quicksand"><strong>Our Team</strong></p>
                    <div class="text-left">
                        <span style="font-family: Quicksand; margin-top: 0; margin-botton: 0;">
                            <strong>
                                Dimas Firmansyah (23/528900/PPA/06692)<br>
                                Gregorius Adi Pradana (23/530354/PPA/06730)<br>
                                Merisa Adha Azzahra (23/530077/PPA/06711)<br>
                                Muhammad Cahaya Saputra (23/530895/PPA/06755)
                            </strong>
                        </span>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>

</div>
@endsection