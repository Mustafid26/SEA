<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile Page</title>
    <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
      .profile-container {
        margin-top: 20px;
      }

      .profile-header {
        display: flex;
        align-items: center;
      }

      .profile-header .back-arrow {
        font-size: 24px;
        text-decoration: none;
        color: #333;
        margin-right: 10px;
      }

      .profile-info {
        margin-top: 20px;
      }

      .profile-picture {
        position: relative;
        display: inline-block;
      }

      .profile-picture img {
        border-radius: 50%;
        width: 50%;
      }

      .edit-icon {
        position: absolute;
        bottom: 0;
        right: 0;
        background-color: white;
        border-radius: 50%;
        padding: 3px;
      }

      .profile-info h4 {
        margin-top: 10px;
      }

      .profile-points {
        margin-top: 10px;
      }

      .profile-options {
        margin-top: 20px;
      }

      .profile-options .btn {
        margin-bottom: 10px;
      }
      .logout-button {
        margin-top: 20px;
        background-color: #219c90 ;
        border-radius: 15px 15px 15px 15px;
        padding: 15px;
      }
      .btn-profile{
        border-radius: 15px 15px 15px 15px;
        padding: 25px;
        background-color: #54bab825;
      }
      .text-profile{
        color: #219c90;
      }
      .icon-profile{
        margin-right: 5px;
      }
      .btn-profile:hover{
        background-color : white;
      }
      .btn-coin:hover{
        color:black;
      }
      .btn-logout:hover{
        color: white;
      }
    </style>
  </head>
  <body>
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
    <div class="container">
        <div class="profile-container">
            <div class="profile-header align-items-center">
                <a href="#" class="back-arrow" style="color: #219c90;"><i class="fa-solid fa-angle-left" style="color: #219c90;"></i> Profil</a>
            </div>
            <div class="profile-info text-center">
                <div class="profile-picture">
                    <img src="{{ asset('img/Bu Ipah Profile.png')}}" alt="Profile Picture" />
                    <div class="edit-icon">
                        <img src="" alt="Edit Icon" />
                    </div>
                </div>
                <h4>{{$user->name}}</h4>
            </div>
            <div class="profile-options">
                <button class="btn-profile btn-coin btn btn-outline-secondary btn-block">
                    <div class="d-flex justify-content-between">
                        <span class="text-profile"><i class="fa fa-solid fa-ticket fa-2xl icon-profile" style="color: #219c90;"></i>Hadiah</span>
                        <span class="badge-pill"><img src="{{ asset('img/coin.png')}} " alt="" srcset=""> 1000 Poin</span>
                    </div>
                </button>
                <a href="/dashboard" style="text-decoration: none;">
                    <button class="btn-profile btn btn-outline-secondary btn-block text-left">
                            <span class="text-profile"><i class="fa fa-solid fa-gear fa-2xl icon-profile" style="color: #219c90;"></i>Pengaturan</span>
                    </button>
                </a>
                <button class=" btn-profile btn btn-outline-secondary btn-block text-left"">
                    <span class="text-profile"><i class="fa fa-solid fa-phone fa-2xl icon-profile" style="color: #219c90;"></i>Hubungi Kami</span>
                </button>
            </div>
            <form method="POST" action="{{ route('logout')}}">    
              @csrf        
              <a href="{{ route('logout') }}" onclick="event.preventDefault();
              this.closest('form').submit();" class="btn-logout">
                <div class="logout-button text-center">
                    <button class="btn" style="color:white;">Keluar</button>
                </div>
              </a>
            </form>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </body>
</html>
