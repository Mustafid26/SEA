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
                    <form action="{{ url('update_pretest_2', $pretest->id) }}" method="post"
                        enctype="multipart/form-data" class="mb-5">

                        @csrf
                        <input type="hidden" name="kelas_id" value="{{ $pretest->kelas->id }}">
                        <div class="mb-3">
                            <label for="question" nameclass="form-label">Pertanyaan</label>
                            <input style="background-color: white !important ; color: black !important;" type="text"
                                class="form-control" id="" name="question" placeholder="Masukkan Pertanyaan"
                                required value="{{ $pretest->question }}">
                        </div>
                        <div class="mb-3">
                            <label for="option1" nameclass="form-label">Opsi A</label>
                            <input style="background-color: white !important ; color: black !important;" type="text"
                                class="form-control" id="" name="option1" placeholder="Masukkan Opsi" required
                                value="{{ $pretest->option1 }}">
                        </div>
                        <div class="mb-3">
                            <label for="option2" nameclass="form-label">Opsi B</label>
                            <input style="background-color: white !important ; color: black !important;" type="text"
                                class="form-control" id="" name="option2" placeholder="Masukkan Opsi" required
                                value="{{ $pretest->option2 }}">
                        </div>
                        <div class="mb-3">
                            <label for="option3" nameclass="form-label">Opsi C</label>
                            <input style="background-color: white !important ; color: black !important;" type="text"
                                class="form-control" id="" name="option3" placeholder="Masukkan Opsi" required
                                value="{{ $pretest->option3 }}">
                        </div>
                        <div class="mb-3">
                            <label for="option4" nameclass="form-label">Opsi D</label>
                            <input style="background-color: white !important ; color: black !important;" type="text"
                                class="form-control" id="" name="option4" placeholder="Masukkan Opsi" required
                                value="{{ $pretest->option4 }}">
                        </div>
                        <div class="mb-3">
                            <label for="correct_answer" nameclass="form-label">Jawaban Benar</label>
                            <input style="background-color: white !important ; color: black !important;" type="text"
                                class="form-control" id="" name="correct_answer" placeholder="Masukkan Jawaban"
                                required value="{{ $pretest->correct_answer }}">
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
