@extends('template.nav')
@section('title', 'Kretech - Profile')
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
                <h2 style="font-family: Quicksand; color: rgba(32, 151, 145, 1); margin-top: -2%"><strong>Profil Pengguna</strong></h2>
                <ion-icon class="mt-3" name="person-circle" style="color: rgba(32, 151, 145, 1); font-size: 200px"></ion-icon>
                <h4>{{session()->get('username')}}</h4>
            </div>
        </div>

    </div>

</div>
@endsection