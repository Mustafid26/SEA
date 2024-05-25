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
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #219c9088;
      }
      .container img {
        margin-top: 50px;
        width: 300px;
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
        .container h5 {
          margin-left: 200px;
        }
      }
      @media (max-width: 1024px) {
        .card {
          width: 100%;
          margin: 0;
          box-sizing: border-box;
        }
      }
      .btn-login {
        background-color: #219c90;
        color: white;
        width: 50%;
      }
      .btn-login:hover{
        color: white;
      }
    </style>
  </head>
  <body>
    <div class="container d-flex justify-content-center">
      <img class="img-fluid" src="SEA.png" alt="" srcset="" />
    </div>
    <div class="container text mt-4">
      <h5><strong>Selamat Datang</strong></h5>
      <h5>Silahkan Login Untuk Lanjut</h5>
    </div>
    <div class="d-flex justify-content-center mt-4">
      <div class="card text-center">
        <div class="card-body">
          <p class="card-text d-flex justify-content-center">
            <input
              type="username"
              class="form-control"
              id="floatingInput"
              placeholder="Nama Pengguna"
              fdprocessedid="8ie8ic"
              control-id="ControlID-1"
            />
          </p>
          <p class="card-text d-flex justify-content-center">
            <input
              type="password"
              class="form-control"
              id="floatingInput"
              placeholder="Kata Sandi"
              fdprocessedid="8ie8ic"
              control-id="ControlID-1"
            />
          </p>
          <a href="#" class="btn btn-login">Masuk</a>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
