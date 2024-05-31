<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/SEA-Login.png') }}">

    <title>Login</title>
    <style>
        body {
          height: 75vh;
          background-color: #219c9088;
         
          
        }
        .mobile-img {
          margin-top: 50px;
          width: 300px;
        }
        .mobile{
          height:100%;
        }
        .card {
          border-radius: 26px 25px 0px 0px;
          -webkit-border-radius: 26px 25px 0px 0px;
          -moz-border-radius: 26px 25px 0px 0px;
          margin: 0;
          width: 100vh;
          display: flex;
          flex-direction: column;
          justify-content: center;
        }
        .card input {
          width: 100%;
        }
        @media (min-width: 1024px) {
          .mobile-text {
            margin-left: 200px;
          }
          .mobile{
            display: none;
          }
        }
        @media (max-width: 1024px) {
          .card {
            width: 100%;
            margin: 0;
            box-sizing: border-box;
          }
          .desktop{
            display: none;
          }
          body {
            height: 75vh;
          }
        }
        .btn-login {
          background-color: #219c90;
          color: white;
          width: 50%;
        }
        .btn-login:hover {
          color: white;
        }
      </style>
  </head>
  <body>
    <div class="desktop">
      <section class="vh-100">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
              <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">
                  <div class="col-md-6 col-lg-5 d-none d-md-block">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                      alt="login form" class="img-fluid h-100" style="border-radius: 1rem 0 0 1rem;" />
                  </div>
                  <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">
                        <x-validation-errors class="mb-4" />

                       <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="d-flex align-items-center mb-3 pb-1">
                          <i class="fas fa-cubes fa-2x me-3" style="color: #219c9088;"></i>
                          <span class="h1 fw-bold mb-0"><img class="img-fluid" src="{{ asset('img/SEA-Login.png')}}" alt="" srcset="" /></span>
                        </div>
      
                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Silahkan Daftarkan Akun Untuk Lanjut</h5>
      
                        <div data-mdb-input-init class="form-outline mb-4">
                          <label class="form-label" for="name" value="{{ __('name') }}" >Nama Pengguna</label>
                          <input type="username" id="name" class="form-control form-control-lg" name="name" :value="old('name')" required autofocus autocomplete="username" />
                        </div>
      
			                  <div data-mdb-input-init class="form-outline mb-4">
                          <label class="form-label" for="nik" value="{{ __('nik') }}">NIK</label>
                          <input type="number" id="nik" class="form-control form-control-lg" name="nik" required autocomplete="current-nik" />
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                          <label class="form-label" for="password" value="{{ __('Password') }}">Kata Sandi</label>
                          <input type="password" id="password" class="form-control form-control-lg" name="password" required autocomplete="current-password" />
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                          <label class="form-label" for="password_confirmation" value="{{ __('Password') }}"> Konfirmasi Kata Sandi</label>
                          <input type="password" id="password_confirmation" class="form-control form-control-lg" name="password_confirmation" required  />
                        </div>
                        
                        <div class="pt-1 mb-4">
                           <button class="btn btn-login">{{ __('Register') }}</button>
                        </div>
                       
                        <p class="mb-5 pb-lg-2" style="color: #219c9088; font-weight: bold;">Sudah Punya Akun? <a href="{{route('login')}}"
                            style="color: black; font-weight: normal;">Klik Di sini</a></p>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <div class="mobile">
      <div class="container d-flex justify-content-center">
        <img class="img-fluid mobile-img" src="{{ asset('img/SEA-Login.png')}}" alt="logoSEA" srcset="" />
      </div>
      <div class="container text mt-4">
        <h5 class="mobile-text"><strong>Selamat Datang</strong></h5>
        <h5 class="mobile-text">Silahkan Login Untuk Lanjut</h5>
      </div>
      <div class="d-flex justify-content-center mt-4" >
        <div class="card">
          <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
              @csrf
              <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="name" value="{{ __('name') }}" >Nama Pengguna</label>
                <input type="username" id="name" class="form-control form-control-lg" name="name" :value="old('name')" required autofocus autocomplete="username" />
              </div>

              <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="nik" value="{{ __('nik') }}">NIK</label>
                <input type="number" id="nik" class="form-control form-control-lg" name="nik" required autocomplete="current-nik" />
              </div>
  
              <div data-mdb-input-init class="form-outline">
                <label class="form-label" for="password" value="{{ __('password') }}">Kata Sandi</label>
                <input type="password" id="password" class="form-control form-control-lg" name="password" required autocomplete="current-password" />
              </div>

              <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="password_confirmation" value="{{ __('Password') }}"> Konfirmasi Kata Sandi</label>
                <input type="password" id="password_confirmation" class="form-control form-control-lg" name="password_confirmation" required  />
              </div>
              
              <div class="pt-1 mb-4">
                <button class="btn btn-login">{{ __('Register') }}</button>
             </div>
            
             <p class="mb-5 pb-lg-2" style="color: #219c9088; font-weight: bold;">Sudah Punya Akun? <a href="{{route('login')}}"
                 style="color: black; font-weight: normal;">Klik Di sini</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>

