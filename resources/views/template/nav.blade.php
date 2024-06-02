<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kretech - Master Template')</title>
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
</head>
<body>
    <nav class="navbar" style="background-color: rgba(32, 151, 145, 1); border-bottom-right-radius: 20px;
    border-bottom-left-radius: 20px;">
        <div class="container">
            <object data="{{asset('old')}}/assets/Group6.svg" alt="Kretech" style="height: 60px; width: auto; margin-bottom: -1px; stroke-width: 0"></object>
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a href="{{url('predict')}}">
                        <img src="{{asset('old')}}/assets/home.png" loading="lazy" style="flex-shrink: 0; height: 52px; width: 52px; object-position: center; object-fit: cover;"/>
                    </a>
                </li>
                <ion-icon name="ellipsis-vertical-outline" style="color: white; align-self: center; font-size: 20px"></ion-icon>
                <li class="nav-item">
                    <a href="{{url('report')}}">
                        <img src="{{asset('old')}}/assets/google-docs.png" loading="lazy" style="flex-shrink: 0; height: 52px; width: 52px; object-position: center; object-fit: cover; align-self: center;"/>
                    </a>
                </li>
                <ion-icon name="ellipsis-vertical-outline" style="color: white; align-self: center; font-size: 20px"></ion-icon>
                <li class="nav-item">
                    <a href="{{url('profile')}}">
                        <img src="{{asset('old')}}/assets/profile-user.png" loading="lazy" style="flex-shrink: 0; height: 52px; width: 52px; object-position: center; object-fit: cover;"/>
                    </a>
                </li>
                <ion-icon name="ellipsis-vertical-outline" style="color: white; align-self: center; font-size: 20px"></ion-icon>
                <li class="nav-item">
                    <a href="{{url('logout')}}">
                        <ion-icon name="log-out" style="color: white; height: 60px; width: 60px; object-position: center; object-fit: cover; flex-shrink: 0;"></ion-icon>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
          <!-- Content goes here-->
          @yield('isi')
        </div>
    </div>

    <div class="" style="display: flex; justify-content: center; padding-left: 1px; margin-bottom: 50px; margin-top: 50px">
        <div class="" style="display: flex; justify-content: center; column-gap: 3.9px; align-items: center;">
            <div class="" style="align-self: stretch;">
                <object data="{{asset('old')}}/assets/Group7.svg" class="" style="height: 14px; width: 9.1px;"
                ></object>
            </div>
            <footer class="" style="font-size: 15px; color: rgba(32, 151, 145, 1);">Kretech©2024</footer>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('sbadmin')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('sbadmin')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{asset('sbadmin')}}/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{asset('sbadmin')}}/js/sb-admin-2.min.js"></script>
    {{-- JS Boostrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    {{-- ICON --}}
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>