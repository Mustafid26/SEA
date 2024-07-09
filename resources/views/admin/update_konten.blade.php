<!DOCTYPE html>
<html lang="en">
<title>Admin SEA</title>

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
                    <form action="{{ url('update_konten_2', $konten->id) }}" method="post" enctype="multipart/form-data"
                        class="mb-5">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="" class="form-label">PPT Terkini</label><br>
                            @if ($konten->konten)
                                <a href="{{ asset('storage/powerpoint_files/' . $konten->konten) }}"
                                    target="_blank">{{ $konten->konten }}</a>
                            @else
                                Tidak ada PPT terkini
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="konten" class="form-label">Update PPT</label>
                            <input style="background-color: white !important; color: black !important;" type="file"
                                class="form-control" name="konten" accept=".ppt,.pptx,.pdf" value="{{ asset('storage/powerpoint_files/' . $konten->konten) }}">
                        </div>
                        <div class="mb-3">
                            <label for="desc" class="form-label">Masukkan Deskripsi</label>
                            <input id="desc" type="hidden" name="desc" value="{{ $konten->desc }}">
                            <trix-editor input="desc"></trix-editor>
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
