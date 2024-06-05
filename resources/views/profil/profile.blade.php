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
                <h2 style="font-family: Quicksand; color: rgba(32, 151, 145, 1); margin-top: -2%"><strong>User Profile</strong></h2>
                @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Nice!</strong> {{Session::get('success')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif(Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>You're Sus!</strong> {{Session::get('error')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <ion-icon class="mt-3" name="person-circle" style="color: rgba(32, 151, 145, 1); font-size: 200px"></ion-icon>
                <div class="row" style="font-family: Quicksand; color: rgba(32, 151, 145, 1);">
                    <h4>
                        <strong>
                            {{session()->get('username')}}
                            <a href="#"  data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: rgba(32, 151, 145, 1);">
                                <ion-icon name="pencil"></ion-icon>
                            </a>
                        </strong>
                    </h4>
                </div>
                <div class="row" style="font-family: Quicksand; color: rgba(32, 151, 145, 1);">
                    <h6 class="fw-bold"><strong>Full Name : {{session()->get('fullName')}}</strong></h6>
                </div>
            </div>
        </div>

    </div>

</div>
{{-- MODAL EDIT PROFIL --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ms-4 me-4">
                <form action="{{url('proses-edit')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-group text-left" style="margin-top: 10px">
                        <label class="control-label" style="margin-bottom: 7px">Username</label>
                        <input type="text" class="form-control form-control-lg input-secondary shadow-sm" name="username" value="{{session()->get('username')}}">
                    </div>
                    <div class="form-group text-left" style="margin-top: 10px">
                        <label class="control-label" style="margin-bottom: 7px">Full Name</label>
                        <input type="text" class="form-control form-control-lg input-secondary shadow-sm" name="fullname" value="{{session()->get('fullName')}}">
                    </div>
                    <div class="form-group text-left" style="margin-top: 10px">
                        <label class="control-label" style="margin-bottom: 7px">Password</label>
                        <input type="password" class="form-control form-control-lg input-secondary shadow-sm" name="password" value="{{session()->get('password')}}">
                    </div>
                    <div class="col-auto mt-5 text-center">
                      <button type="submit" class="btn btn-lg mb-3" style="background-color: rgba(32, 151, 145, 1); color: white; width: 35%; height: 60px"><strong>Save</strong></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>  
@endsection