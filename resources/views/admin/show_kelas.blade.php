<!DOCTYPE html>
<html lang="en">
<title>Admin FDA</title>

<head>
    @include('admin.css')
    <style>
    .content-wrapper {
        overflow-x: auto !important;
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
                    <table class="table">
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Nama Kelas</th>
                              <th scope="col">Detail Kelas</th>
                              <th scope="col">Deskripsi Kelas</th>
                              <th scope="col">Gambar</th>
                              <th scope="col">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($kelas as $k)
                            <tr class="content">
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $k->nama_kelas}}</td>
                                <td>{{ $k->detail_kelas }}</td>
                                <td>{{ $k->deskripsi }}</td>
                                <td>
                                    <img style="max-width: 100%;" src="{{ asset('storage/'. $k->image) }}"
                                    alt="gambar kelas" loading="lazy">
                                </td>
                                <td>
                                    <a class="btn btn-warning" href="{{url('update_kelas',$k->id)}}" role="button">Edit</a>
                                    <a onclick="confirmation(event)" class="btn btn-danger"
                                        href="{{url('delete_kelas',$k->id)}}">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                          </tbody>
                    </table>
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
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>

</html>