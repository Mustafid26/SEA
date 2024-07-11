<!DOCTYPE html>
<html lang="en">
<title>Admin SEA</title>
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">
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

        tr {
            color: white;
        }

        .content:hover {
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
                                <th scope="col">ID_Sekari</th>
                                <th scope="col">Rombel</th>
                                <th scope="col">Nama Lengkap</th>
                                <th scope="col">Nama Pengguna</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Role</th>
                                <th scope="col">Points</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $a)
                                <tr class="content">
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $a->ID_Sekari }}</td>
                                    <td>{{ $a->rombel }}</td>
                                    <td>{{ $a->nama_lengkap }}</td>
                                    <td>{{ $a->name }}</td>
                                    <td>{{ $a->nik }}</td>
                                    <td>{{ $a->role }}</td>
                                    <td>{{ $a->points }}</td>
                                    <td>
                                        <a class="btn btn-warning" href="{{ url('update_user', $a->id) }}"
                                            role="button">Edit User</a>
                                        <a class="btn btn-primary" href="{{ url('show_jawaban', $a->id) }}"
                                                role="button">Lihat Jawaban Pretest</a>
                                        <a class="btn btn-primary" href="{{ url('show_jawaban_postest', $a->id) }}"
                                                role="button">Lihat Jawaban Postest</a>
                                        @if($a->usertype != 1)
                                            <a onclick="confirmation(event)" class="btn btn-danger" href="{{ url('delete_user', $a->id) }}">
                                                Delete
                                            </a>
                                        @endif
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
