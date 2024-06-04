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
            <div class="modal-body">
                <form action="{{url('proses-edit')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-group text-left" style="margin-top: 10px">
                        <label class="control-label" style="margin-bottom: 7px">Username</label>
                        <input type="text" class="form-control form-control-lg input-secondary shadow-sm" name="username">
                    </div>
                    <div class="form-group text-left" style="margin-top: 10px">
                        <label class="control-label" style="margin-bottom: 7px">Full Name</label>
                        <input type="text" class="form-control form-control-lg input-secondary shadow-sm" name="fullname">
                    </div>
                    <div class="form-group text-left" style="margin-top: 10px">
                        <label class="control-label" style="margin-bottom: 7px">Password</label>
                        <input type="password" class="form-control form-control-lg input-secondary shadow-sm" name="password">
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