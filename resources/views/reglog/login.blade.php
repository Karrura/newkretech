<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kretech - Login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no" />
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#49CEFF">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#49CEFF" />
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <!-- Custom fonts for this template-->
    {{-- <link href="{{asset('sbadmin')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@500"/>
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('old')}}/styles.css" /> --}}
    <link rel="stylesheet" type="text/css" href="{{asset('old')}}/compiled-styles.css" />
    <!-- Custom styles for this template-->
    {{-- <link href="{{asset('sbadmin')}}/css/sb-admin-2.min.css" rel="stylesheet"> --}}
    {{-- Boostrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    {{-- ICON --}}
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
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
{{-- user-page --}}
{{-- <style>
    .sectionHeight {
    height:100vh;
    }
</style> --}}
<body style="min-height: 100vh; display: flex; flex-direction: column;"> 
    <div class="wrapper" style="min-height: 100vh;">
        <div class="container-fluid" style="min-height: 100vh;">
            <!-- Nested Row within Card Body -->
            <div class="row" style="min-height: 100vh;">
                <div class="col" style="min-height: 100vh;">
                    <div class="carousel slide" id="carouselExample" style="min-height: 100vh;">
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
                                            {{-- <i class="bi bi-eye-slash input-group-text" id="togglePassword"></i>
                                            <input type="password" class="form-control form-control-lg input-secondary shadow-sm" name="password" required> --}}
                                        </div>
                                        <div class="input-group flex-nowrap text-left">
                                            <input type="password" class="form-control form-control-lg" id="password" name="password" required>
                                            <span class="input-group-text" id="addon-wrapping">
                                                <ion-icon name="eye" id="togglePassword"></ion-icon>
                                            </span>
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
                            <div class="carousel-item" >
                                <div class="p-5 m-5" >
                                    <div class="text-left">
                                        <h1 class="" style="font-family: Quicksand; margin-bottom: 0px; margin-top: -30px;"><strong style="color: rgba(32, 151, 145, 1);">Isi Data berikut untuk membuat akun</strong></h1>
                                    </div>
                                </div>
                                <div class="ps-5 pe-5 pt-5 m-5">
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
                                            {{-- <i class="bi bi-eye-slash input-group-text" id="togglePassword"></i>
                                            <input type="password" class="form-control form-control-lg input-secondary shadow-sm" name="password" required> --}}
                                        </div>
                                        <div class="input-group flex-nowrap text-left">
                                            <input type="password" class="form-control form-control-lg" id="passwordRegist" name="password" required>
                                            <span class="input-group-text" id="addon-wrapping">
                                                <ion-icon name="eye" id="togglePasswordRegist"></ion-icon>
                                            </span>
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
                    <div class="card-body text-center" style="margin-top: auto;">
                        <p class="text-center" style="font-size: 15px; color: rgba(32, 151, 145, 1);">
                            <img src="{{asset('old/assets')}}/Group6.svg" style="height: 14px; width: auto;" class="gambar">
                            <a href="{{url('aboutus')}}" style="text-decoration:none; color: rgba(32, 151, 145, 1); z-index:1">
                            Kretech©2024</a>
                        </p>
                    </div>
                </div>
                
                <div class="col" style="background-color: rgba(32, 151, 145, 1); border-top-left-radius: 120px; min-height: 100vh;">
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

    {{-- JS Boostrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
<script>
    $("#togglePassword").click(function(){
        var input = $("#password");
        if (input.attr("type") === "password") {
            input.attr("type", "text");
            $("#togglePassword").attr('name', 'eye-off');
        } else {
            input.attr("type", "password");
            $("#togglePassword").attr('name', 'eye');
        }
    }); 
    $("#togglePasswordRegist").click(function(){
        var input = $("#passwordRegist");
        if (input.attr("type") === "password") {
            input.attr("type", "text");
            $("#togglePasswordRegist").attr('name', 'eye-off');
        } else {
            input.attr("type", "password");
            $("#togglePasswordRegist").attr('name', 'eye');
        }
    }); 
</script>

</html>