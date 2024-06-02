<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kretech - Login</title>

    <!-- Custom fonts for this template-->
    {{-- <link href="{{asset('sbadmin')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@500"/>
    <link rel="stylesheet" type="text/css" href="{{asset('old')}}/styles.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('old')}}/compiled-styles.css" />
    <!-- Custom styles for this template-->
    {{-- <link href="{{asset('sbadmin')}}/css/sb-admin-2.min.css" rel="stylesheet"> --}}
    {{-- Boostrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <style>
        .gambar {
            display: inline-block;
            width: 50%;
        }
        .gambar:after {
            content: "<span>Caption</span>";
        }
    </style>
</head>
<body class="user-page">
    <div class="wrapper">
        <div class="container-fluid-lg">
            <!-- Outer Row -->
            <div class="row justify-content-center">
                <div class="card o-hidden">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="carousel slide" id="carouselExample">
                                    <div class="carousel-inner">
                                        {{-- CAROUSEL LOGIN --}}
                                        <div class="carousel-item active">
                                            <div class="p-5 m-5">
                                                <div class="text-left">
                                                    <h1 class="" style="font-family: Quicksand; margin-bottom: 0px; margin-top: -30px"><strong>Selamat </strong><strong style="color: rgba(32, 151, 145, 1);">Datang</strong></h1>
                                                    <p class="h5" style="font-family: Quicksand; font-size:20px;"><strong>Silahkan Login untuk mendeteksi diabetes</strong></p>
                                                </div>
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
                                            </div>
                                            <div class="p-5 m-5">
                                                <form action="{{url('proses-login')}}" method="post" enctype="multipart/form-data" class="" style="margin-top: -120px; font-family: Quicksand;">
                                                    @csrf
                                                    @method('POST')
                                                    <div class="form-group text-left" style="margin-top: 10px">
                                                        <label class="control-label" style="margin-bottom: 7px">Username</label>
                                                        <input type="text" class="form-control form-control-lg input-secondary shadow-sm" name="username" required>
                                                    </div>
                                                    <div class="form-group text-left" style="margin-top: 10px">
                                                        <label class="control-label" style="margin-bottom: 7px">Password</label>
                                                        <input type="password" class="form-control form-control-lg input-secondary shadow-sm" name="password" required>
                                                    </div>
                                                    <div class="form-check checkbox-xl text-left" style="margin-top: 15px;">
                                                        <input type="checkbox" class="form-check-input input-secondary shadow-sm" name="rememberme" style="">
                                                        <label class="form-check-label" style="">Ingat Saya</label>
                                                    </div>
                                                    <div class="col-auto mt-5 text-center">
                                                      <button type="submit" class="btn btn-lg mb-3" style="background-color: rgba(32, 151, 145, 1); color: white; width: 35%; height: 60px"><strong>Masuk</strong></button>
                                                    </div>
                                                </form>
                                                <div class="text-center" style="font-family: Quicksand">
                                                    <p>Pengguna Baru? <a href="#" style="text-decoration: none; color: rgba(32, 151, 145, 1);" data-bs-target="#carouselExample" data-bs-slide="prev" id="buat_akun">Buat akun</a></p>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        {{-- CAROUSEL REGIST --}}
                                        <div class="carousel-item" id="carousel_regist">
                                            <div class="p-5 m-5" >
                                                <div class="text-left">
                                                    <h1 class="" style="font-family: Quicksand; margin-bottom: 0px; margin-top: -30px;"><strong style="color: rgba(32, 151, 145, 1);">Isi Data berikut untuk membuat akun</strong></h1>
                                                </div>
                                            </div>
                                            <div class="p-5 m-5">
                                                <form action="{{url('proses-regist')}}" method="post" enctype="multipart/form-data" class="" style="margin-top: -120px; font-family: Quicksand;">
                                                    @csrf
                                                    @method('POST')
                                                    <div class="form-group text-left" style="margin-top: 10px">
                                                        <label class="control-label" style="margin-bottom: 7px">Nama Lengkap</label>
                                                        <input type="text" class="form-control form-control-lg input-secondary shadow-sm" name="nama_lengkap" required>
                                                    </div>
                                                    <div class="form-group text-left" style="margin-top: 10px">
                                                        <label class="control-label" style="margin-bottom: 7px">Username</label>
                                                        <input type="text" class="form-control form-control-lg input-secondary shadow-sm" name="username" required>
                                                    </div>
                                                    <div class="form-group text-left" style="margin-top: 10px">
                                                        <label class="control-label" style="margin-bottom: 7px">Password</label>
                                                        <input type="password" class="form-control form-control-lg input-secondary shadow-sm" name="password" required>
                                                    </div>
                                                    <div class="col-auto mt-5 text-center">
                                                      <button type="submit" class="btn btn-lg mb-3" style="background-color: rgba(32, 151, 145, 1); color: white; width: 35%; height: 60px"><strong>Daftar</strong></button>
                                                    </div>
                                                </form>
                                                <div class="text-center" style="font-family: Quicksand">
                                                    <p>Sudah punya akun? <a href="#" style="text-decoration: none; color: rgba(32, 151, 145, 1);" data-bs-target="#carouselExample" data-bs-slide="next" id="login_akun">Login</a></p>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- FOOTER --}}
                                <div class="card-body text-center" style="margin-top: -60px">
                                    <p class="text-center" style="font-size: 15px; color: rgba(32, 151, 145, 1);">
                                        <img src="{{asset('old/assets')}}/Group6.svg" style="height: 14px; width: auto;" class="gambar">
                                        Kretech©2024
                                    </p>
                                </div>
                            </div>
                            
                            <div id="div_right" class="col-lg-6" style="background-color: rgba(32, 151, 145, 1); border-top-left-radius: 120px">
                                <div class="text-left" style="margin-top:100px; line-height: 1.1; color: white; font-family: Quicksand">
                                    <p style="font-size: 50px; margin: 100px">Deteksi <strong>Diabetes</strong> sedini mungkin untuk langkah <strong>Preventif</strong></p>
                                </div>
                                <div class="float-end">
                                    <img src="{{asset('old/assets')}}/asasawd-2.png" alt="img" style="height: 371px; width: auto; margin-top: -110px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <script>
        $('#buat_akun').on('click', function(){
            $('#div_right').css('filter', 'brightness(50%)');
        });

        $('#login_akun').on('click', function(){
            $('#div_right').css('filter', 'brightness(100%)');
        });
    </script> --}}

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('sbadmin')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('sbadmin')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{asset('sbadmin')}}/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{asset('sbadmin')}}/js/sb-admin-2.min.js"></script>
    {{-- JS Boostrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    

</body>

</html>