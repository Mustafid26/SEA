<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SEKARI EDU ACADEMY</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link rel="stylesheet" href="css/style.css">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

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
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
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
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><img src="img/SEA.png" alt="" srcset=""></h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="/" class="nav-item nav-link {{ ($active === 'beranda') ? 'active' : ' ' }}">Beranda</a>
                <a href="about.html" class="nav-item nav-link">Tentang</a>
                <a href="/kelas" class="nav-item nav-link {{ ($active === 'kelas') ? 'active' : ' ' }}">Kelas</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="team.html" class="dropdown-item">Team Kami</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="404.html" class="dropdown-item">Mitra</a>
                    </div>
                </div>
                <a href="contact.html" class="nav-item nav-link">Contact</a>
                <a href="" class="nav-item btn btn-primary py-4 px-lg-5">Login<i class="fa fa-arrow-right ms-3"></i></a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    {{-- content --}}
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <h4 class="d-flex justify-content-center wowfadeInUp"><strong>Kelas</strong></h4>
                @yield('button')
                @yield('kosong')
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div id="sidebar">
                        @yield('sidebar')
                    </div>
                </div>
                <div class="col-lg-9 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div id="content">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end content --}}

    <!-- JavaScript -->
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
