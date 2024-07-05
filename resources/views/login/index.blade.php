<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <title>Login</title>
    <style>
      body {
        background-color: #219c9088;
      }
      .mobile-img {
        margin-top: 100px;
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
        .btn-login{
          margin-top: 10vh;
        }
        .desktop{
          display: none;
        }
        .container-mobile {
          margin-top: 10vh;
        }
        body {
          height: 75vh;
        }
        .form-outline{
          margin-top: 50px;
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
                      <form>
                        @csrf
                        <div class="d-flex align-items-center mb-3 pb-1">
                          <i class="fas fa-cubes fa-2x me-3" style="color: #219c9088;"></i>
                          <span class="h1 fw-bold mb-0"><img class="img-fluid" src="{{ asset('img/SEA-Login.png')}}" alt="" srcset="" /></span>
                        </div>
      
                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Silahkan Login Untuk Lanjut</h5>
      
                        <div data-mdb-input-init class="form-outline mb-4">
                          <input type="username" id="form2Example17" class="form-control form-control-lg" />
                          <label class="form-label" for="form2Example17">Nama Pengguna</label>
                        </div>
      
                        <div data-mdb-input-init class="form-outline mb-4">
                          <input type="password" id="form2Example27" class="form-control form-control-lg" />
                          <label class="form-label" for="form2Example27">Kata Sandi</label>
                        </div>
      
                        <div class="pt-1 mb-4 tombol-login">
                          <a href="#" class="btn btn-login">Masuk</a>
                        </div>
      
                        <a class="small text-muted" href="#!">Lupa Kata Sandi?</a>
                        <p class="mb-5 pb-lg-2" style="color: #219c9088;">Don't have an account? <a href="#!"
                            style="color: #219c9088;">Register here</a></p>
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
        <img class="img-fluid mobile-img" src="{{ asset('img/SEA-Login.png')}}" alt="" srcset="" />
      </div>
      <div class="container text container-mobile">
        <h5 class="mobile-text"><strong>Selamat Datang</strong></h5>
        <h5 class="mobile-text">Silahkan Login Untuk Lanjut</h5>
      </div>
      <div class="d-flex justify-content-center mt-4">
        <div class="card">
          <div class="card-body">
            <form action="">
              @csrf
              <div data-mdb-input-init class="form-outline mb-4">
                <input type="username" id="username" class="form-control form-control-lg" />
                <label class="form-label" for="username">Nama Pengguna</label>
              </div>
  
              <div data-mdb-input-init class="form-outline">
                <input type="password" id="password" class="form-control form-control-lg" />
                <label class="form-label" for="password">Kata Sandi</label>
              </div>
              <a class="small text-muted" href="#!">Lupa Kata Sandi?</a>
              <div class="pt-1 mb-4 text-center">
                <a href="#" class="btn btn-login">Masuk</a>
              </div>
              <p class="mb-5 pb-lg-2 text-center" style="color: #219c9088;">Don't have an account? 
              <a href="#!"style="color: #219c9088;">Register here</a></p>
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
