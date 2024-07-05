<!DOCTYPE html>
<html lang="en">
<title>Admin SEA</title>

<head>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    @include('admin.css')
    <style>
        .content-wrapper {
            overflow-x: auto !important;
            background-color: rgb(0, 0, 0);
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

        tr {
            color: white;
        }

        .content:hover {
            background-color: rgb(129, 103, 103);
        }

        trix-toolbar [data-trix-button-group="file-tools"] {
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
                    <form action="{{ url('update_foto_2', $foto->id) }}" method="post" enctype="multipart/form-data"
                        class="mb-5">

                        @csrf

                        <div class="mb-3">
                            <label for="title" nameclass="form-label">Judul</label>
                            <input style="background-color: white !important ; color: black !important;" type="text"
                                class="form-control" id="" name="title" placeholder="Masukkan Nama Kelas"
                                required value="{{ $foto->title }}">
                        </div>

                        <div class="mb-3">
                            <label for="desc" class="form-label">Deskripsi</label>
                            <input style="background-color: white !important ; color: black !important;" type="text"
                                class="form-control" id="" name="desc" placeholder="Masukkan Deskripsi"
                                required value="{{ $foto->desc }}">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Foto Terkini</label><br>
                            <img style="margin: auto;" width="30%" src="{{ asset('storage/' . $foto->image) }}"
                                alt="foto terkini">
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Update Gambar</label>
                            <input style="background-color: white !important ; color: black !important;" type="file"
                                class="form-control" name="image">
                        </div>


                        <button type="submit" class="btn btn-primary">Update</button>
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

    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>

</html>
