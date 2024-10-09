<!DOCTYPE html>
<html lang="en">
<title>Admin SEA</title>
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">
<head>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    @include('admin.css')
    <style>
    .content-wrapper {
        overflow-x: auto !important;
        background-color: rgb(89, 89, 89);
    }
    .div_center {
        text-align: center;
        padding-top: 50px;
    }

    .h1coy {
        font-size: 30px;
        text-align: center;
    }

    .input_color {
        color: black;
    }

    .center {
        margin: auto;
        width: 50%;
        text-align: center;
        margin-top: 50px;
        border: 4px solid gray;
        background-color: white;
    }
    tr{
        color:white;
    }
    .content:hover{
        background-color: rgb(129, 103, 103);
    }
    trix-toolbar [data-trix-button-group="file-tools"] 
    {
    display: none;
    }
    </style>
</head>

<body>
    <div class="container-scroller">
        @include('sweetalert::alert')
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.header')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <form action="{{url('update_artikel_2',$artikel->id)}}" method="post" class="mb-5" enctype="multipart/form-data">
                        
                        @csrf
                        <div class="mb-3">
                            <label for="title" nameclass="form-label">Judul Artikel</label>
                            <input style="background-color: white !important ; color: black !important;" type="text" class="form-control " id="title" name="title" placeholder="Masukkan Judul" required value="{{$artikel->title}}">
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input style="background-color: white !important ; color: black !important;" type="text" class="form-control" id="slug" name="slug" placeholder="Masukkan Slug" required value="{{$artikel->slug}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Foto Terkini</label><br>
                            <img style="margin: auto;" width="30%" src="{{asset('storage/' . $artikel->image)}}"
                            alt="foto terkini">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Upload Gambar</label>
                            <input style="background-color: white !important ; color: black !important;" type="file" class="form-control" name="image">
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Body</label>
                            <input id="body" type="hidden" name="body" value="{{$artikel->body}}">
                            <trix-editor input="body"></trix-editor>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.js')
    <script>
    function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);
        swal({
                title: "Are you sure to delete this user?",
                text: "You will not be able to revert this!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willCancel) => {
                if (willCancel) {



                    window.location.href = urlToRedirect;

                }


            });


    }
    </script>
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>

</html>