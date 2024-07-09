<!DOCTYPE html>
<html lang="en">
<title>Admin SEA</title>

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
                                <th scope="col">Judul_materi</th>
                                <th scope="col">Nama Kelas</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Jumlah Soal Pretest</th>
                                <th scope="col">Jumlah Soal Postest</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($materi as $m)
                                <tr class="content">
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $m->judul_materi }}</td>
                                    <td>{{ $m->kelas->nama_kelas }}</td>
                                    <td>
                                        <img style="max-width: 100%;" src="{{ asset('storage/' . $m->kelas->image) }}"
                                            alt="gambar kelas" loading="lazy">
                                    </td>
                                    <td>
                                        {{ $m->total_pretest ?? '0' }}
                                    </td>
                                    <td>
                                        {{ $m->total_postest ?? '0' }}
                                    </td>
                                    <td>
                                        <a class="btn btn-success" href="{{ url('view_konten', $m->id) }}"
                                            role="button">Add Konten</a>
                                        <a class="btn btn-primary" href="#"
                                            onclick="soalConfirmation(event, '{{ $m->id }}')"
                                            role="button">Lihat Soal</a>
                                        <a class="btn btn-warning" href="{{ url('update_materi', $m->id) }}"
                                            role="button">Edit Materi</a>
                                        <a onclick="confirmation(event)" class="btn btn-danger"
                                            href="{{ url('delete_materi', $m->id) }}">Delete</a>
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
                    title: "Are you sure to delete this Materi?",
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
    <script>
        function soalConfirmation(event, id) {
            event.preventDefault();
            var urlToRedirect = event.currentTarget.getAttribute('href');

            swal({
                title: "What do you want to see?",
                buttons: {
                    show_pretest: {
                        text: "Soal Pretest",
                        value: "show_pretest",
                        className: "btn-success"
                    },
                    show_postest: {
                        text: "Soal Postest",
                        value: "show_postest",
                        className: "btn-info"
                    },
                    cancel: {
                        text: "Cancel",
                        value: "cancel",
                        visible: true,
                        className: "btn-secondary",
                        closeModal: true,
                    }
                }
            }).then((value) => {
                switch (value) {
                    case "show_pretest":
                        window.location.href = `{{ url('show_pretest') }}/${id}`;
                        break;
                    case "show_postest":
                        window.location.href = `{{ url('show_postest') }}/${id}`;
                        break;
                    case "cancel":
                        break;
                }
            });
        }
    </script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>

</html>
