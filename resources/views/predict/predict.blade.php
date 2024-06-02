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
                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Nice!</strong> {{Session::get('success')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @elseif(Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Crap!</strong> {{Session::get('error')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
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
                        <h5><a href="{{url('report')}}/{{session('username')}}" style="color: rgba(32, 151, 145, 1); font-family: Quicksand;"><strong>Lihat riwayat prediksi</strong></a></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection