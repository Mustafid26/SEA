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
                    <form action="{{ url('update_user_2', $data->id) }}" method="post" class="mb-5">

                        @csrf
                        <div class="mb-3">
                            <label for="name" nameclass="form-label">ID Sekari</label>
                            <input type="text" style="background-color: white !important; color: black !important;"
                                class="form-control " id="ID_Sekari" name="ID_Sekari" placeholder="" 
                                value="{{ $data->ID_Sekari }}">
                        </div>
                        <div class="mb-3">
                            <label for="name" nameclass="form-label">Nama Lengkap</label>
                            <input type="text" style="background-color: white !important; color: black !important;"
                                class="form-control " id="name" name="name" placeholder="" required
                                value="{{ $data->nama_lengkap }}">
                        </div>
                        <div class="mb-3">
                            <label for="name" nameclass="form-label">Nama</label>
                            <input type="text" style="background-color: white !important; color: black !important;"
                                class="form-control " id="name" name="name" placeholder="" required
                                value="{{ $data->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="name" nameclass="form-label">Rombel</label>
                            <input type="text" style="background-color: white !important; color: black !important;"
                                class="form-control " id="rombel" name="rombel" placeholder=""
                                value="{{ $data->rombel }}">
                        </div>
                        <div class="mb-3">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="text" style="background-color: white !important; color: black !important;"
                                class="form-control" id="nik" name="nik" placeholder="" required
                                value="{{ $data->nik }}">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" style="background-color: white !important; color: black !important;"
                                class="form-control" id="password" name="password"
                                placeholder="Enter new password if you want to change it">
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Role</label>
                            <select name="role" id="" class="input_color" style="width: 200px;" required
                                value="{{ $data->role }}">
                                <option value="" selected="">Tambahkan Role</option>
                                <option value="admin" {{ old('role', $data->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="user" {{ old('role', $data->role) == 'user' ? 'selected' : '' }}>User</option>
                                <option value="sekari" {{ old('role', $data->role) == 'sekari' ? 'selected' : '' }}>Sekari</option>
                            </select><br><br>
                        </div>
                        <label for="points" class="form-label">Points</label>
                        <input type="text" style="background-color: white !important; color: black !important;"
                            class="form-control" id="points" name="points" value="{{ old('points', $data->points) }}"
                            placeholder="Enter new points if you want to change it">
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
