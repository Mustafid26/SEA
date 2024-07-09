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
                    <form action="{{ url('add_konten') }}" method="post" class="mb-5" enctype="multipart/form-data"
                        id="main-form">
                        @csrf
                        <h1 class="h1coy">Add Konten</h1>
                        <input type="hidden" name="materi_id" value="{{ $materi->id }}">
                        <input type="hidden" name="kelas_id" value="{{ $materi->kelas->id }}">
                        <div class="mb-3">
                            <label for="judul_materi" class="form-label">Judul Materi</label>
                            <input style="background-color: white !important; color: black !important;" type="text"
                                class="form-control" id="judul_materi" name="judul_materi"
                                placeholder="Masukkan Nama Kelas" required value="{{ $materi->judul_materi }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="nama_kelas" class="form-label">Nama Kelas</label>
                            <input style="background-color: white !important; color: black !important;" type="text"
                                class="form-control" id="nama_kelas" name="nama_kelas" placeholder="Masukkan Nama Kelas"
                                required value="{{ $materi->kelas->nama_kelas }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="selection" class="form-label">Select Action</label>
                            <select class="form-control" id="selection" name="selection" onchange="showForm()"
                                style="background-color: white !important; color:black !important;">
                                <option value="">Select an option</option>
                                <option value="add_konten">Add Konten</option>
                                <option value="add_pretest">Add Pretest</option>
                                <option value="add_postest">Add Postest</option>
                            </select>
                        </div>
                        <div id="form-container">
                            <!-- Dynamic form content will be inserted here -->
                        </div>
                        <button type="submit" class="btn btn-primary" id="submit-btn"
                            style="display: none;">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('admin.js')
    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgpre = document.querySelector('.img-preview');

            imgpre.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgpre.src = oFREvent.target.result;
            }
        }
    </script>
    <script>
        function showForm() {
            const selection = document.getElementById('selection').value;
            const formContainer = document.getElementById('form-container');
            const submitBtn = document.getElementById('submit-btn');

            formContainer.innerHTML = '';
            submitBtn.style.display = 'none';

            if (selection === 'add_konten') {
                formContainer.innerHTML = `
                    <div class="mb-3">
                        <label materi" class="form-label">Upload Konten (PowerPoint)</label>
                        <input type="file" style="background-color: white !important; color:black !important;" name="konten" id="konten" class="form-control" accept=".ppt,.pptx,.pdf">
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">Masukkan Deskripsi</label>
                        <input id="desc" type="hidden" name="desc" value="">
                        <trix-editor input="desc"></trix-editor>
                    </div>
                `;
                submitBtn.style.display = 'block';
            } else if (selection === 'add_pretest') {
                formContainer.innerHTML = `
                    <table class="table">
                        <tr>
                            <td><label for="kelas" class="form-label">Menambah Pretest Pada Kelas</label></td>
                            <td>
                                <input type="text" style="background-color: white !important; color:black !important;" class="form-control" placeholder="{{ $materi->kelas->nama_kelas }}" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="question" class="form-label">Question</label></td>
                            <td>
                                <input type="text" style="background-color: white !important; color:black !important;" name="question" id="question" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="option1" class="form-label">Option 1</label></td>
                            <td>
                                <input type="text" style="background-color: white !important; color:black !important;" name="option1" id="option1" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="option2" class="form-label">Option 2</label></td>
                            <td>
                                <input type="text" style="background-color: white !important; color:black !important;" name="option2" id="option2" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="option3" class="form-label">Option 3</label></td>
                            <td>
                                <input type="text" style="background-color: white !important; color:black !important;" name="option3" id="option3" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="option4" class="form-label">Option 4</label></td>
                            <td>
                                <input type="text" style="background-color: white !important; color:black !important;" name="option4" id="option4" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="correct_answer" class="form-label">Correct Answer</label></td>
                            <td>
                                <input type="text" style="background-color: white !important; color:black !important;" name="correct_answer" id="correct_answer" class="form-control" required>
                            </td>
                        </tr>
                    </table>

                `;
                submitBtn.style.display = 'block';

            } else if (selection === 'add_postest') {
                formContainer.innerHTML = `
                    <table class="table">
                        <tr>
                            <td><label for="kelas" class="form-label">Menambah Pos0test Pada Kelas</label></td>
                            <td>
                                <input type="text" style="background-color: white !important; color:black !important;" class="form-control" placeholder="{{ $materi->kelas->nama_kelas }}" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="question" class="form-label">Question</label></td>
                            <td>
                                <input type="text" style="background-color: white !important; color:black !important;" name="question" id="question" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="option1" class="form-label">Option 1</label></td>
                            <td>
                                <input type="text" style="background-color: white !important; color:black !important;" name="option1" id="option1" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="option2" class="form-label">Option 2</label></td>
                            <td>
                                <input type="text" style="background-color: white !important; color:black !important;" name="option2" id="option2" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="option3" class="form-label">Option 3</label></td>
                            <td>
                                <input type="text" style="background-color: white !important; color:black !important;" name="option3" id="option3" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="option4" class="form-label">Option 4</label></td>
                            <td>
                                <input type="text" style="background-color: white !important; color:black !important;" name="option4" id="option4" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="correct_answer" class="form-label">Correct Answer</label></td>
                            <td>
                                <input type="text" style="background-color: white !important; color:black !important;" name="correct_answer" id="correct_answer" class="form-control" required>
                            </td>
                        </tr>
                    </table>
                `;
                submitBtn.style.display = 'block';
            }
        }
    </script>
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>

</html>
