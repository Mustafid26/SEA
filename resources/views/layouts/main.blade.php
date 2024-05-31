<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SEKARI EDU ACADEMY</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link rel="stylesheet" href="{{ asset('css/style.css')}}">

   
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/SEA-Login.png') }}">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Maven Pro' rel='stylesheet'>

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>

    <script src="{{ asset('lib/wow/wow.min.js')}}"></script>
    <script src="{{ asset('lib/easing/easing.min.js')}}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <style>
        body {
            font-family: 'Maven Pro';
        }
    </style>
</head>
<body>
    {{-- <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End --> --}}

    <!-- Navbar Start -->
    <nav class="navbar-top">
        <img src="{{ asset('img/SEA.png')}}" alt="Logo" class="logo">
        <div class="nav-container">
            <div class="nav-links">
                <a href="/" class="{{ ($active === 'beranda') ? 'active' : '' }}">BERANDA</a>
                <a href="/about" class="{{ ($active === 'tentang') ? 'active' : '' }}">TENTANG</a>
                <a href="/kelas" class="{{ ($active === 'kelas') ? 'active' : '' }}">KELAS</a>
                <a href="/artikel" class="{{ ($active === 'artikel') ? 'active' : '' }}">ARTIKEL</a>
            </div>
            <a href="/login" class="login-button"> Login <i class="fa fa-arrow-right"></i></a>
        </div>
    </nav>

    <nav class="bottom-bar">
        <a href="/" class="{{ ($active === 'beranda') ? 'active' : '' }}">
            <i class="fa fa-home"></i>
            BERANDA
        </a>
        <a href="/about" class="{{ ($active === 'tentang') ? 'active' : '' }}">
            <i class="fa fa-circle-question"></i>
            TENTANG
        </a>
        <a href="/kelas" class="{{ ($active === 'kelas') ? 'active' : '' }}">
            <i class="fa fa-chalkboard-user"></i>
            KELAS
        </a>
        <a href="/artikel" class="{{ ($active === 'artikel') ? 'active' : '' }}">
            <i class="fa fa-newspaper"></i>
            ARTIKEL
        </a>
        @auth
        <a href="/profile" class="{{ ($active === 'profile') ? 'active' : '' }}">
            <i class="fa fa-solid fa-user"></i>
            PROFILE
        </a>
        @else
        <a href="/login" class="{{ ($active === 'login') ? 'active' : '' }}">
            <i class="fa fa-right-to-bracket"></i>
            LOGIN
        </a>
        @endauth
    </nav>
    <!-- Navbar End -->

    {{-- content --}}
    <div class="container">
        @yield('konten')
    </div>
    {{-- end content --}}

    <!-- JavaScript -->
    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js')}}"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
