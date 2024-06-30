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
                    <form action="{{url('add_kelas')}}" method="post" class="mb-5" enctype="multipart/form-data">                
                        @csrf
                        <h1 class="h1coy">Add Kelas</h1>
                        <div class="mb-3">
                            <label for="nama_kelas" nameclass="form-label">Nama Kelas</label>
                            <input style="background-color: white !important ; color: black !important;" type="text" class="form-control" id="nama_kelas" name="nama_kelas" placeholder="Masukkan Nama Kelas" required value="">
                        </div>
                        <div class="mb-3">
                            <label for="detail_kelas" class="form-label">Detail Kelas</label>
                            <input type="text" style="background-color: white !important; color: black !important;" class="form-control" id="detail_kelas" name="detail_kelas" placeholder="Masukkan Detail Kelas " required value="">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input id="body" type="hidden" name="deskripsi" value="">
                            <trix-editor input="body"></trix-editor>
                        </div>
                        <div class="mb-3">
                            <label for="image" nameclass="form-label">Upload Gambar</label>
                            <img src="" class="img-fluid img-preview mb-3 col-sm-5" alt="" style="max-width: 20%">
                            <input type="file" style="background-color: white !important; " name="image" id="image" class="form-control" id="inputGroupFile02" onchange="previewImage()">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('admin.js')
    <script>
        document.addEventListener('trix-file-accept', function (event) {
            event.preventDefault();
            alert('File attachment not supported!');
        });
    </script>
    <script>

        function previewImage(){
          const image = document.querySelector('#image');
          const imgpre = document.querySelector('.img-preview');
      
          imgpre.style.display = 'block';
      
          const oFReader = new FileReader();
          oFReader.readAsDataURL(image.files[0]);
      
          oFReader.onload = function(oFREvent){
            imgpre.src = oFREvent.target.result;
          }
        }
      
      
    </script>
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>