<!DOCTYPE html>
<html lang="en">
<title>Admin SEA</title>
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/logoserat.png') }}">

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
                                <th scope="col">No</th>
                                <th scope="col">Nama Lengkap</th>
                                <th scope="col">Nama Pengguna</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Nilai Pretest</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nilai as $n)
                                <tr class="content">
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $n->user->nama_lengkap }}</td>
                                    <td>{{ $n->user->name }}</td>
                                    <td>{{ $n->kelas->nama_kelas }}</td>
                                    <td>{{ $n->score ?? 'Nilai belum ada' }}</td>
                                    <td>
                                        <a class="btn btn-warning" href="{{ url('update_nilai_pretest', $n->id) }}"
                                            role="button">Edit</a>
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
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>

</html>
